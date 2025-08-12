<?php

namespace App\View\Components;

use App\Models\Property;
use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class PropertyCard extends Component
{
    /** 
     * The property to display in the card.
     * 
     * @var \App\Models\Property

     */
    public Property $property;

    /**
     * Create a new component instance.
     * 
     * @param \App\Models\Property
     */
    public function __construct(Property $property)
    {
        $this->property = $property;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.property-card');
    }
}
