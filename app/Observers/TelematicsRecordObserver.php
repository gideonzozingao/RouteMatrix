<?php

namespace App\Observers;

use App\Models\TelematicsRecord;

class TelematicsRecordObserver
{
    /**
     * Handle the TelematicsRecord "created" event.
     */
    public function created(TelematicsRecord $telematicsRecord): void
    {
        //
    }

    /**
     * Handle the TelematicsRecord "updated" event.
     */
    public function updated(TelematicsRecord $telematicsRecord): void
    {
        //
    }

    /**
     * Handle the TelematicsRecord "deleted" event.
     */
    public function deleted(TelematicsRecord $telematicsRecord): void
    {
        //
    }

    /**
     * Handle the TelematicsRecord "restored" event.
     */
    public function restored(TelematicsRecord $telematicsRecord): void
    {
        //
    }

    /**
     * Handle the TelematicsRecord "force deleted" event.
     */
    public function forceDeleted(TelematicsRecord $telematicsRecord): void
    {
        //
    }
}
