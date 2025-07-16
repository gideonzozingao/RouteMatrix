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
        Schema::create('maintenance_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('maintenance_schedule_id')->constrained('maintenance_schedules')->onDelete('cascade');
            $table->foreignId('performed_by')->constrained('users')->onDelete('set null')->nullable();
            $table->dateTime('performed_at');
            $table->text('notes')->nullable();
            $table->decimal('cost', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance_records');
    }
};
