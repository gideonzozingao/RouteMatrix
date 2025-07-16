<?php

namespace App\Observers;

use App\Models\AlertType;

class AlertTypeObserver
{
    /**
     * Handle the AlertType "created" event.
     */
    public function created(AlertType $alertType): void
    {
        //
    }

    /**
     * Handle the AlertType "updated" event.
     */
    public function updated(AlertType $alertType): void
    {
        //
    }

    /**
     * Handle the AlertType "deleted" event.
     */
    public function deleted(AlertType $alertType): void
    {
        //
    }

    /**
     * Handle the AlertType "restored" event.
     */
    public function restored(AlertType $alertType): void
    {
        //
    }

    /**
     * Handle the AlertType "force deleted" event.
     */
    public function forceDeleted(AlertType $alertType): void
    {
        //
    }
}
