<?php

namespace App\Observers;

use App\Models\MaintenanceSchedule;

class MaintenanceScheduleObserver
{
    /**
     * Handle the MaintenanceSchedule "created" event.
     */
    public function created(MaintenanceSchedule $maintenanceSchedule): void
    {
        //
    }

    /**
     * Handle the MaintenanceSchedule "updated" event.
     */
    public function updated(MaintenanceSchedule $maintenanceSchedule): void
    {
        //
    }

    /**
     * Handle the MaintenanceSchedule "deleted" event.
     */
    public function deleted(MaintenanceSchedule $maintenanceSchedule): void
    {
        //
    }

    /**
     * Handle the MaintenanceSchedule "restored" event.
     */
    public function restored(MaintenanceSchedule $maintenanceSchedule): void
    {
        //
    }

    /**
     * Handle the MaintenanceSchedule "force deleted" event.
     */
    public function forceDeleted(MaintenanceSchedule $maintenanceSchedule): void
    {
        //
    }
}
