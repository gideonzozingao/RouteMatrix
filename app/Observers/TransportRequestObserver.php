<?php

namespace App\Observers;

use App\Models\TransportRequest;

class TransportRequestObserver
{
    /**
     * Handle the TransportRequest "created" event.
     */
    public function created(TransportRequest $transportRequest): void
    {
        //
    }

    /**
     * Handle the TransportRequest "updated" event.
     */
    public function updated(TransportRequest $transportRequest): void
    {
        //
    }

    /**
     * Handle the TransportRequest "deleted" event.
     */
    public function deleted(TransportRequest $transportRequest): void
    {
        //
    }

    /**
     * Handle the TransportRequest "restored" event.
     */
    public function restored(TransportRequest $transportRequest): void
    {
        //
    }

    /**
     * Handle the TransportRequest "force deleted" event.
     */
    public function forceDeleted(TransportRequest $transportRequest): void
    {
        //
    }
}
