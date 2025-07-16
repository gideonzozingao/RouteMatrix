<?php

namespace App\Models;

use App\Observers\AlertTypeObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(AlertTypeObserver::class)]

class AlertType extends Model
{
    //
}
