<?php

namespace App\Http\Controllers;

use App\Http\Middleware\IsWorker;
use App\Models\Order;
use App\Models\Product;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // If user is admin, show all orders
        if ($user->role === 'admin') {
            $orders = Order::with('product', 'reservation')
                ->orderBy("created_at", "desc")
                ->get();
        } else {
            // For regular users, show only their own orders
            $orders = Order::with('product', 'reservation')
                ->whereHas('reservation', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->orderBy("created_at", "desc")
                ->get();
        }

        $groupedOrders = $orders->groupBy('reservation_id');

        $groupedOrdersArray = $groupedOrders->toArray();

        $page = request()->get('page', 1);
        $perPage = 5;

        $paginator = new \Illuminate\Pagination\LengthAwarePaginator(
            array_slice($groupedOrdersArray, ($page - 1) * $perPage, $perPage),
            count($groupedOrdersArray),
            $perPage,
            $page,
            ['path' => request()->url()]
        );

        return view('orders.index', compact('paginator'));
    }

    public function create()
    {
        $user = Auth::user();
        if ($user->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'Unauthorized');
        }

        $products = Product::all();
        $reservations = Reservation::all();

        return view('orders.create', compact('products', 'reservations'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if ($user->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 401)
                ->withHeaders(['Location' => route('dashboard')]);
        }

        $request->validate([
            'product_id' => 'required',
            'reservation_id' => 'required',
            'quantity' => 'required',
        ]);

        $product = Product::find($request->product_id);


        if ($product->stock < $request->quantity) {
            return redirect()->route('orders.create')->with('error', 'Not enough quantity available. Only ' . $product->stock . ' left.');
        }

        $totalPrice = $product->price * $request->quantity;

        $order = Order::create([
            'product_id' => $product->id,
            'reservation_id' => $request->reservation_id,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        $product->stock -= $request->quantity;
        $product->save();

        return redirect()->route('orders.index')->with('success', 'Order created successfully');
    }

    public function show(Order $order)
    {
        $user = Auth::user();
        if ($user->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 401)
                ->withHeaders(['Location' => route('dashboard')]);
        }

        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $user = Auth::user();
        if ($user->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 401)
                ->withHeaders(['Location' => route('dashboard')]);
        }

        $products = Product::all();
        $reservations = Reservation::all();

        return view('orders.edit', compact('order', 'products', 'reservations'));
    }

    public function update(Request $request, Order $order)
    {
        $user = Auth::user();
        if ($user->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 401)
                ->withHeaders(['Location' => route('dashboard')]);
        }

        $request->validate([
            'product_id' => 'required',
            'reservation_id' => 'required',
            'quantity' => 'required',
        ]);

        $product = Product::find($request->product_id);

        if ($product->stock < $request->quantity) {
            return redirect()->route('orders.edit', $order)->with('error', 'Not enough quantity available. Only ' . $product->stock . ' left.');
        }

        $product->stock -= $request->quantity;
        $product->save();

        $order->update($request->all());
        return redirect()->route('orders.index');
    }

    public function destroy(Order $order)
    {
        $user = Auth::user();
        if ($user->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'Unauthorized');
        }

        // If reservation is in the past, can't delete
        if ($order->reservation->date < now()) {
            return redirect()->route('orders.index')->with('error', 'Can\'t delete order for past reservation');
        }

        $order->delete();
        return redirect()->route('orders.index');
    }
}