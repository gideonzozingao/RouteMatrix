<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $models = [
            'AlertType',
            'Booking',
            'ComplianceDocument',
            'DriverProfile',
            'DriverSchedule',
            'Expense',
            'FuelEntry',
            'Incident',
            'MaintenanceRecord',
            'MaintenanceSchedule',
            'Notification',
            'Part',
            'Permission',
            'Role',
            'Route',
            'Seat',
            'TelematicsRecord',
            'TransportRequest',
            'Trip',
            'User',
            'Vehicle',
            'VehicleAssignment',
            'VehicleType',
        ];

        $actions = ['view', 'create', 'update', 'delete'];

        $now = Carbon::now();

        $permissions = [];

        foreach ($models as $model) {
            foreach ($actions as $action) {
                $permissionName = strtolower($action) . ' ' . Str::snake($model, ' ');
                $permissions[] = [
                    'name' => $permissionName,
                    'guard_name' => 'web',
                    'description' => ucfirst($action) . ' permission for ' . $model,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        DB::table('permissions')->insertOrIgnore($permissions);
    }
}
