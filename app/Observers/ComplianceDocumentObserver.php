<?php

namespace App\Observers;

use App\Models\ComplianceDocument;

class ComplianceDocumentObserver
{
    /**
     * Handle the ComplianceDocument "created" event.
     */
    public function created(ComplianceDocument $complianceDocument): void
    {
        //
    }

    /**
     * Handle the ComplianceDocument "updated" event.
     */
    public function updated(ComplianceDocument $complianceDocument): void
    {
        //
    }

    /**
     * Handle the ComplianceDocument "deleted" event.
     */
    public function deleted(ComplianceDocument $complianceDocument): void
    {
        //
    }

    /**
     * Handle the ComplianceDocument "restored" event.
     */
    public function restored(ComplianceDocument $complianceDocument): void
    {
        //
    }

    /**
     * Handle the ComplianceDocument "force deleted" event.
     */
    public function forceDeleted(ComplianceDocument $complianceDocument): void
    {
        //
    }
}
