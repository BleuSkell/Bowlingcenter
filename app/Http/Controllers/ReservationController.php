<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Lane;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
class ReservationController extends Controller
{
    public function index()
    {
        // Paginate and load lanes for the reservations
        $reservations = Reservation::with('lane')->paginate(10);
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        // Retrieve all lanes to display in the reservation creation form
        $lanes = Lane::all();
        return view('reservations.create', compact('lanes'));
    }

    public function store(Request $request)
    {
        // Use a database transaction to handle any errors
        DB::beginTransaction();
        try {
            // Validate request data
            $validated = $request->validate([
                'date' => 'required|date',
                'start_time' => 'required',
                'end_time' => 'required|after:start_time',
                'lane_id' => 'required|exists:lanes,id',
                'status' => 'required|string',
                'adult_count' => 'required|integer|min:1',
                'child_count' => 'nullable|integer|min:0',
                'is_active' => 'required|boolean',
                'comment' => 'nullable|string|max:255',
            ]);
            
            // Handle price calculation on the server side as well
            // Extract hourly rate from price field
            $priceText = $request->input('price');
            $price = 0;
            
            // Simple price extraction from the text field
            if (preg_match('/€(\d+\.?\d*)/', $priceText, $matches)) {
                $price = floatval($matches[1]);
            }
            
            // Add price to validated data
            $validated['price'] = $price;
            
            // Handle checkbox properly
            $validated['is_active'] = $request->has('is_active') ? 1 : 0;
            
            // Add user_id
            $validated['user_id'] = auth()->id();

            // Create the reservation
            Reservation::create($validated);

            DB::commit();
            
            return redirect()->route('reservations.index')->with('success', 'Reservering aangemaakt!');
        } catch (\Exception $e) {
            DB::rollBack();
            
            return back()->withErrors(['error' => 'Error creating reservation: ' . $e->getMessage()])->withInput();
        }
    }

    public function edit(Reservation $reservation)
    {
        // Retrieve all lanes to display in the reservation edit form
        $lanes = Lane::all();
        
        // Get current values for preselecting in dropdowns
        $currentStartTime = $reservation->start_time;
        $currentEndTime = $reservation->end_time;
        
        return view('reservations.edit', compact('reservation', 'lanes', 'currentStartTime', 'currentEndTime'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        // Use a database transaction to handle any errors
        DB::beginTransaction();
        
        try {
            // Validate request data
            $validated = $request->validate([
                'date' => 'required|date',
                'start_time' => 'required',
                'end_time' => 'required|after:start_time',
                'lane_id' => 'required|exists:lanes,id',
                'status' => 'required|string',
                'comment' => 'nullable|string|max:255',

            ]);
            
            // Handle price calculation on the server side as well
            // Extract hourly rate from price field
            $priceText = $request->input('price');
            $price = 0;
            
            // Simple price extraction from the text field
            if (preg_match('/€(\d+\.?\d*)/', $priceText, $matches)) {
                $price = floatval($matches[1]);
            }
            
            // Add price to validated data
            $validated['price'] = $price;
            
            // Handle checkbox properly
            $validated['is_active'] = $request->has('is_active') ? 1 : 0;
            
            // Update the reservation
            $reservation->update($validated);
            
            DB::commit();
            
            return redirect()->route('reservations.index')->with('success', 'Reservering bijgewerkt!');
        } catch (\Exception $e) {
            DB::rollBack();
            
            return back()->withErrors(['error' => 'Error updating reservation: ' . $e->getMessage()])->withInput();
        }
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Reservering verwijderd!');
    }
}

