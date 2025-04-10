<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;
use App\Models\Reservation;

class ScoreController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();

        return view('scores.index', compact('reservations'));
    }

    public function show($id)
    {
        $scores = Score::where('reservation_id', $id)->get();

        return view('scores.show', compact('scores'));
    }

    public function create($reservationId)
    {
        return view('scores.create', compact('reservationId'));
    }

    public function store(Request $request, $reservationId)
    {
        $request->validate([
            'person' => 'required|integer|min:1|max:5',
            'score' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:255',
        ]);

        Score::create([
            'reservation_id' => $reservationId,
            'person' => $request->input('person'),
            'score' => $request->input('score'),
            'comment' => $request->input('comment'),
        ]);

        return redirect()->route('scores.show', ['id' => $reservationId])->with('success', 'Score created successfully.');
    }

    public function edit($id)
    {
        $score = Score::findOrFail($id);

        return view('scores.edit', compact('score'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'person' => 'required|integer|min:1|max:5',
            'score' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:255',
        ]);

        $score = Score::findOrFail($id);
        $score->update([
            'person' => $request->input('person'),
            'score' => $request->input('score'),
            'comment' => $request->input('comment'),
        ]);

        return redirect()->route('scores.show', ['id' => $score->reservation_id])->with('success', 'Score updated successfully.');
    }

    public function destroy($id)
    {
        $score = Score::findOrFail($id);
        $reservationId = $score->reservation_id;
        $score->delete();

        return redirect()->route('scores.show', ['id' => $reservationId])->with('success', 'Score deleted successfully.');
    }
}
