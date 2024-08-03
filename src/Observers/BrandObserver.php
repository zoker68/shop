<?php

namespace Zoker68\Shop\Observers;

use Zoker68\Shop\Models\Brand;

class BrandObserver
{
    public static function saving(Brand $brand): void
    {
        $brand->checkSlug();
    }

    /**
     * Handle the Brand "created" event.
     */
    public function created(Brand $brand): void
    {
        //
    }

    /**
     * Handle the Brand "updated" event.
     */
    public function updated(Brand $brand): void
    {
        //
    }

    /**
     * Handle the Brand "deleted" event.
     */
    public function deleted(Brand $brand): void
    {
        //
    }

    /**
     * Handle the Brand "restored" event.
     */
    public function restored(Brand $brand): void
    {
        //
    }

    /**
     * Handle the Brand "force deleted" event.
     */
    public function forceDeleted(Brand $brand): void
    {
        //
    }
}
