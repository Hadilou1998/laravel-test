<?php

namespace App\Livewire;

use App\Models\Property;
use Livewire\Component;

class Dashboard extends Component
{
    public $property;

    public function mount($property)
    {
        $this->property = Property::latest()->get();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
