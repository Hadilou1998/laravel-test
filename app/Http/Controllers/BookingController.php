<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        // Recupère toutes les réservations
        $bookings = Booking::latest()->paginate(10);

        // Renvoie la vue bookings/index.blade.php avec la liste des réservations
        return view('bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Renvoie la vue bookings/create.blade.php
        return view('bookings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'user_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        // Crée une nouvelle réservation
        Booking::create($request->all());

        // Redirige vers la vue bookings/show.blade.php avec la réservation créée
        return redirect()->route('bookings.index')
                        ->with('success', 'Réservation créée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        return view('bookings.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'user_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        // Met à jour la réservation
        $booking->update($request->all());

        // Redirige vers la vue bookings/index.blade.php avec un message de succès
        return redirect()->route('bookings.index')
                        ->with('success', 'Réservation mise à jour avec succès');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        
        return redirect()->route('bookings.index')
                        ->with('success', 'Réservation supprimée avec succès');
    }
}