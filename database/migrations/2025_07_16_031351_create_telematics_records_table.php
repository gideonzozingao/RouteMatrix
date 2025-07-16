<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('telematics_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained()->onDelete('cascade');
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->decimal('altitude', 8, 2)->nullable()->comment('Altitude in meters');
            $table->unsignedSmallInteger('speed')->nullable()->comment('Speed in km/h');
            $table->unsignedSmallInteger('heading')->nullable()->comment('Direction in degrees (0-360)');
            $table->unsignedTinyInteger('gps_fix_status')->default(1)->comment('GPS fix status: 1=valid, 0=invalid');
            $table->unsignedTinyInteger('satellites_used')->nullable()->comment('Count of GPS satellites used');
            $table->unsignedSmallInteger('engine_rpm')->nullable();
            $table->decimal('engine_load', 5, 2)->nullable()->comment('Engine load in %');
            $table->decimal('throttle_position', 5, 2)->nullable()->comment('Throttle position in %');
            $table->boolean('ignition_status')->nullable()->comment('Engine on/off status');
            $table->boolean('check_engine_light')->nullable()->comment('Check engine light status');
            $table->decimal('battery_voltage', 5, 2)->nullable()->comment('Battery voltage in volts');
            $table->unsignedBigInteger('odometer')->nullable()->comment('Vehicle odometer reading in meters');
            $table->decimal('fuel_level', 5, 2)->nullable()->comment('Fuel level in liters or %');
            $table->boolean('seatbelt_status')->nullable()->comment('Driver seatbelt fastened (true/false)');
            $table->json('dtc_codes')->nullable()->comment('Array of Diagnostic Trouble Codes in JSON');
            $table->timestamp('recorded_at')->index();
            $table->timestamps();
            $table->index(['vehicle_id', 'recorded_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('telematics_records');
    }
};
