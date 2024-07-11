<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Medtracker\Medication;
use App\Models\Medtracker\Pharmacy;
use App\Models\Medtracker\Prescriber;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Roles
        $admin_role = Role::create(['name' => 'admin']);
        $user_role = Role::create(['name' => 'user']);

        // User permissions
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'view user']);
        Permission::create(['name' => 'delete users']);

        // Medication permissions
        Permission::create(['name' => 'create medications']);
        Permission::create(['name' => 'edit medications']);
        Permission::create(['name' => 'view medications']);
        Permission::create(['name' => 'delete medications']);

        // Prescriber permissions
        Permission::create(['name' => 'create prescribers']);
        Permission::create(['name' => 'edit prescribers']);
        Permission::create(['name' => 'view prescribers']);
        Permission::create(['name' => 'delete prescribers']);

        // Pharmacy permissions
        Permission::create(['name' => 'create pharmacies']);
        Permission::create(['name' => 'edit pharmacies']);
        Permission::create(['name' => 'view pharmacies']);
        Permission::create(['name' => 'delete pharmacies']);

        // Reminders permissions
        Permission::create(['name' => 'create reminders']);
        Permission::create(['name' => 'edit reminders']);
        Permission::create(['name' => 'view reminders']);
        Permission::create(['name' => 'delete reminders']);

        // Give appropriate permissions to roles
        $user_role->givePermissionTo('edit user');
        $user_role->givePermissionTo('view user');
        $user_role->givePermissionTo('create medications');
        $user_role->givePermissionTo('edit medications');
        $user_role->givePermissionTo('view medications');
        $user_role->givePermissionTo('delete medications');
        $user_role->givePermissionTo('create prescribers');
        $user_role->givePermissionTo('edit prescribers');
        $user_role->givePermissionTo('view prescribers');
        $user_role->givePermissionTo('delete prescribers');
        $user_role->givePermissionTo('create pharmacies');
        $user_role->givePermissionTo('edit pharmacies');
        $user_role->givePermissionTo('view pharmacies');
        $user_role->givePermissionTo('delete pharmacies');
        $user_role->givePermissionTo('create reminders');
        $user_role->givePermissionTo('edit reminders');
        $user_role->givePermissionTo('view reminders');
        $user_role->givePermissionTo('delete reminders');

        // Give all permissions to admin role
        $admin_role->givePermissionTo('create users');
        $admin_role->givePermissionTo('edit users');
        $admin_role->givePermissionTo('view users');
        $admin_role->givePermissionTo('delete users');
        $admin_role->givePermissionTo('create medications');
        $admin_role->givePermissionTo('edit medications');
        $admin_role->givePermissionTo('view medications');
        $admin_role->givePermissionTo('delete medications');
        $admin_role->givePermissionTo('create prescribers');
        $admin_role->givePermissionTo('edit prescribers');
        $admin_role->givePermissionTo('view prescribers');
        $admin_role->givePermissionTo('delete prescribers');
        $admin_role->givePermissionTo('create pharmacies');
        $admin_role->givePermissionTo('edit pharmacies');
        $admin_role->givePermissionTo('view pharmacies');
        $admin_role->givePermissionTo('delete pharmacies');
        $admin_role->givePermissionTo('create reminders');
        $admin_role->givePermissionTo('edit reminders');
        $admin_role->givePermissionTo('view reminders');
        $admin_role->givePermissionTo('delete reminders');

        // Seed the database with a single user
        $user = User::factory()->create([
            'name' => 'Drew Walton',
            'email' => 'hi@dwalton.info',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);

        $user->assignRole('admin');

        // Seed the database with a pharmacy
        $pharmacy = Pharmacy::factory()->create([
            'name' => 'MedTracker',
            'address' => '123 Main St',
            'phone' => '555-555-5555',
            'city' => 'Anytown',
            'state' => 'CA',
            'zip' => '12345',
            'user_id' => $user->id,
        ]);

        $prescriber = Prescriber::factory()->create([
            'name' => 'John Doe',
            'address' => '123 Main St',
            'phone' => '555-555-5555',
            'city' => 'Anytown',
            'state' => 'CA',
            'zip' => '12345',
            'user_id' => $user->id,
        ]);

        // Add some medications to the database
        Medication::factory()->create([
            'name' => 'Aspirin',
            'description' => 'Pain reliever',
            'dosage' => '500mg',
            'frequency' => 'daily',
            'start_date' => now(),
            'end_date' => now()->addYear(),
            'prescriber_id' => $prescriber->id,
            'pharmacy_id' => $pharmacy->id,
            'user_id' => $user->id,
        ]);

        Medication::factory()->create([
            'name' => 'Ibuprofen',
            'description' => 'Pain reliever',
            'dosage' => '400mg',
            'frequency' => 'daily',
            'start_date' => now(),
            'end_date' => now()->addYear(),
            'prescriber_id' => $prescriber->id,
            'pharmacy_id' => $pharmacy->id,
            'user_id' => $user->id,
        ]);

        Medication::factory()->create([
            'name' => 'Naproxen',
            'description' => 'Pain reliever',
            'dosage' => '500mg',
            'frequency' => 'daily',
            'start_date' => now(),
            'end_date' => now()->addYear(),
            'prescriber_id' => $prescriber->id,
            'pharmacy_id' => $pharmacy->id,
            'user_id' => $user->id,
        ]);
    }
}
