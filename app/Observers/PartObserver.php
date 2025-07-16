<?php

namespace App\Observers;

use App\Models\Part;

class PartObserver
{
    /**
     * Handle the Part "created" event.
     */
    public function created(Part $part): void
    {
        //
    }

    /**
     * Handle the Part "updated" event.
     */
    public function updated(Part $part): void
    {
        //
    }

    /**
     * Handle the Part "deleted" event.
     */
    public function deleted(Part $part): void
    {
        //
    }

    /**
     * Handle the Part "restored" event.
     */
    public function restored(Part $part): void
    {
        //
    }

    /**
     * Handle the Part "force deleted" event.
     */
    public function forceDeleted(Part $part): void
    {
        //
    }
}
