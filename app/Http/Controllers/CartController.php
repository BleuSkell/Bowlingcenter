<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display the cart page.
     */
    public function index()
    {
        // Reservations of the user
        $reservations = Reservation::where('user_id', Auth::user()->id)->get();

        return view('cart.index', compact('reservations'));
    }

    /**
     * Process the checkout and create orders.
     */
    public function checkout(Request $request)
    {
        // Validate the request
        $request->validate([
            'cart_data' => 'required|string',
            'reservation_id' => 'nullable|exists:reservations,id',
        ]);

        // Get the cart data
        $cartData = json_decode($request->cart_data, true);

        if (empty($cartData)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        // Get the reservation ID if provided
        $reservationId = $request->reservation_id;

        // If no reservation ID is provided, try to get the user's active reservation
        if (!$reservationId) {
            $user = Auth::user();
            $activeReservation = Reservation::where('user_id', $user->id)
                ->where('status', 'active')
                ->latest()
                ->first();

            if ($activeReservation) {
                $reservationId = $activeReservation->id;
            } else {
                return redirect()->route('cart.index')->with('error', 'No active reservation found. Please select a reservation.');
            }
        }

        // Create orders for each item in the cart
        foreach ($cartData as $item) {
            $product = Product::find($item['product_id']);

            if (!$product) {
                continue;
            }

            Order::create([
                'product_id' => $product->id,
                'reservation_id' => $reservationId,
                'quantity' => $item['quantity'],
                'total_price' => $product->price * $item['quantity'],
                'status' => 'pending',
            ]);
        }

        // Clear the cart in localStorage (this will be done by JavaScript)
        $request->session()->forget('bowling_cart');

        // Redirect to success page or back to products
        return redirect()->route('extras.index')->with('success', 'Your order has been created successfully!');
    }
}