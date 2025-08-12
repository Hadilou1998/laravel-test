<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Booking;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class BookingManager extends Component
{
    public $propertyId;
    public $start_date;
    public $end_date;
    public $property;

    protected $rules = [
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
    ];

    protected $messages = [
        'end_date.after_or_equal' => 'La date de fin doit être égale ou ultérieure à la date de début.',
    ];

    public function mount($propertyId = null)
    {
        $this->propertyId = $propertyId;
        if ($propertyId) {
            $this->property = Property::find($propertyId);
        }
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    protected function hasOverlap($propertyId, $start, $end)
    {
        return Booking::where('id', $propertyId)
            ->where(function ($query) use ($start, $end) {
                $query->whereBetween('start_date', [$start, $end])
                    ->orWhereBetween('end_date', [$start, $end])
                    ->orWhereRaw('? BETWEEN start_date AND end_date', [$start])
                    ->orWhereRaw('? BETWEEN start_date AND end_date', [$end]);
            })->exists();
    }

    public function book()
    {
        $this->validate();

        if (! $this->propertyId) {
            $this->addError('property', 'La propriété doit être sélectionnée.');
            return;
        }

        // ensure property exists
        $property = Property::find($this->propertyId);
        if (!$property) {
            $this->addError('property', 'La propriété sélectionnée n\'existe pas.');
            return;
        }

        // check for overlap
        if ($this->hasOverlap($this->propertyId, $this->start_date, $this->end_date)) {
            $this->addError('start_date', 'La propriété est déjà réservée dans les dates sélectionnées.');
            return;
        }

        Booking::create([
            'user_id' => Auth::id(),
            'property_id' => $this->propertyId,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);

        // reset fields
        $this->start_date = null;
        $this->end_date = null;

        $this->emit('bookingSuccess');
        session()->flash('success', 'Votre réservation a été effectuée avec succès.');
    }

    public function render()
    {
        return view('livewire.booking-manager');
    }
}
