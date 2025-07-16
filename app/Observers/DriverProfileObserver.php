<?php

namespace App\Observers;

use App\Models\DriverProfile;

class DriverProfileObserver
{
    /**
     * Handle the DriverProfile "created" event.
     */
    public function created(DriverProfile $driverProfile): void
    {
        //
    }

    /**
     * Handle the DriverProfile "updated" event.
     */
    public function updated(DriverProfile $driverProfile): void
    {
        //
    }

    /**
     * Handle the DriverProfile "deleted" event.
     */
    public function deleted(DriverProfile $driverProfile): void
    {
        //
    }

    /**
     * Handle the DriverProfile "restored" event.
     */
    public function restored(DriverProfile $driverProfile): void
    {
        //
    }

    /**
     * Handle the DriverProfile "force deleted" event.
     */
    public function forceDeleted(DriverProfile $driverProfile): void
    {
        //
    }
}
