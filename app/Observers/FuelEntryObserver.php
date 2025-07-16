<?php

namespace App\Observers;

use App\Models\FuelEntry;

class FuelEntryObserver
{
    /**
     * Handle the FuelEntry "created" event.
     */
    public function created(FuelEntry $fuelEntry): void
    {
        //
    }

    /**
     * Handle the FuelEntry "updated" event.
     */
    public function updated(FuelEntry $fuelEntry): void
    {
        //
    }

    /**
     * Handle the FuelEntry "deleted" event.
     */
    public function deleted(FuelEntry $fuelEntry): void
    {
        //
    }

    /**
     * Handle the FuelEntry "restored" event.
     */
    public function restored(FuelEntry $fuelEntry): void
    {
        //
    }

    /**
     * Handle the FuelEntry "force deleted" event.
     */
    public function forceDeleted(FuelEntry $fuelEntry): void
    {
        //
    }
}
