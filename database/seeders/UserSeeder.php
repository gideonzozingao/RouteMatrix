<?php

namespace Database\Seeders;

use App\Models\Role as ModelsRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\User;
// Uncomment if you're using Spatie permission package
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create default admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'System Admin',
                'password' => Hash::make('password'),
                'phone' => '1234567890',
                'address' => 'HQ Office',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        // Assign admin role if using Spatie permissions
        if (class_exists(ModelsRole::class)) {
            $admin->assignRole('admin');
        }

        // Optional: Add another sample user (e.g., Dispatcher)
        $dispatcher = User::firstOrCreate(
            ['email' => 'dispatcher@example.com'],
            [
                'name' => 'Fleet Dispatcher',
                'password' => Hash::make('password'),
                'phone' => '9876543210',
                'address' => 'Dispatch HQ',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        if (class_exists(ModelsRole::class)) {
            $dispatcher->assignRole('dispatcher');
        }
    }
}
