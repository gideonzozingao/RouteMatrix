<?php

namespace App\Observers;

use App\Models\DriverSchedule;

class DriverScheduleObserver
{
    /**
     * Handle the DriverSchedule "created" event.
     */
    public function created(DriverSchedule $driverSchedule): void
    {
        //
    }

    /**
     * Handle the DriverSchedule "updated" event.
     */
    public function updated(DriverSchedule $driverSchedule): void
    {
        //
    }

    /**
     * Handle the DriverSchedule "deleted" event.
     */
    public function deleted(DriverSchedule $driverSchedule): void
    {
        //
    }

    /**
     * Handle the DriverSchedule "restored" event.
     */
    public function restored(DriverSchedule $driverSchedule): void
    {
        //
    }

    /**
     * Handle the DriverSchedule "force deleted" event.
     */
    public function forceDeleted(DriverSchedule $driverSchedule): void
    {
        //
    }
}
