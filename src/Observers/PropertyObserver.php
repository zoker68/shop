<?php

namespace Zoker68\Shop\Observers;

use Illuminate\Support\Str;
use Zoker68\Shop\Models\Property;

class PropertyObserver
{
    public function saving(Property $property): void
    {
        if (! $property->sort) {
            $max = Property::max('sort');

            $property->sort = $max + 1;
        }

        if ($property->pivot) {
            $property->pivot->index_value = Str::slug($property->pivot->value);
            $property->pivot->save();
        }
    }

    /**
     * Handle the Property "created" event.
     */
    public function created(Property $property): void
    {
        //
    }

    /**
     * Handle the Property "updated" event.
     */
    public function updated(Property $property): void
    {
        //
    }

    /**
     * Handle the Property "deleted" event.
     */
    public function deleted(Property $property): void
    {
        //
    }

    /**
     * Handle the Property "restored" event.
     */
    public function restored(Property $property): void
    {
        //
    }

    /**
     * Handle the Property "force deleted" event.
     */
    public function forceDeleted(Property $property): void
    {
        //
    }
}
