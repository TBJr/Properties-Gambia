<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionsSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create Permissions
        Permission::create(['name' => 'Create Property']);
        Permission::create(['name' => 'Update Client Info']);
        Permission::create(['name' => 'Update Profile']);
        Permission::create(['name' => 'View Profile']);

        // Create Roles and Assign Existing Permissions
        $role1 = Role::create(['name' => 'Client']);
        $role1->givePermissionTo('Update Profile');
        $role1->givePermissionTo('View Profile');

        $role2 = Role::create(['name' => 'Admin']);
        
        $role3 = Role::create(['name' => 'Super-Admin']);
        // Gets all permissions via Gate::before rule; See AuthServiceProvider

        // Create Demo Users
        $user = \App\Models\User::factory()->create([
            'name' => 'TBJ',
            'fname' => 'Thomas',
            'mname' => 'S.',
            'lname' => 'Brown',
            'email' => 'thomas.brown@propertiesgambia.co.uk',
            'gender' => 'male',
            'role' => 'super-admin',
        ]);
        $user->assignRole($role3);

        $user = \App\Models\User::factory()->create([
            'name' => 'Daniel',
            'fname' => 'Daniel',
            'mname' => 'Yusuf.',
            'lname' => 'Samba',
            'email' => 'daniel.samba@propertiesgambia.co.uk',
            'gender' => 'male',
            'role' => 'super-admin',
            'profession' => 'CEO',
        ]);
        $user->assignRole($role3);

        $user = \App\Models\User::factory()->create([
            'name' => 'Jibril',
            'fname' => 'Jibril',
            'mname' => 'D.K',
            'lname' => 'Bah',
            'email' => 'jibril.bah@propertiesgambia.co.uk',
            'gender' => 'male',
            'role' => 'admin',
            'profession' => 'Office Manager',
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Cherno',
            'fname' => 'Cherno',
            'mname' => '',
            'lname' => 'Jallow',
            'email' => 'cherno.jallow@propertiesgambia.co.uk',
            'gender' => 'male',
            'role' => 'admin',
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Abolrous',
            'fname' => 'Abolrous',
            'mname' => 'S.',
            'lname' => 'AHazem',
            'email' => 'abolrous.hazem@email.com',
            'gender' => 'male',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Ackerman',
            'fname' => 'Ackerman',
            'mname' => 'S.',
            'lname' => 'Pilar',
            'email' => 'ackerman.pilar@email.com',
            'gender' => 'male',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Adams',
            'fname' => 'Adams',
            'mname' => 'S.',
            'lname' => 'Terry',
            'email' => 'adams.terry@email.com',
            'gender' => 'male',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Mary',
            'fname' => 'Mary',
            'mname' => 'S.',
            'lname' => 'Claire',
            'email' => 'mary.claire@email.com',
            'gender' => 'female',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Aisha',
            'fname' => 'Aisha',
            'mname' => 'M.',
            'lname' => 'Konare',
            'email' => 'aisha.konara@email.com',
            'gender' => 'female',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Destine',
            'fname' => 'Destine',
            'mname' => 'R.',
            'lname' => 'Brown',
            'email' => 'destine.brown@email.com',
            'gender' => 'female',
            'role' => 'client',
        ]);
        $user->assignRole($role1);
    }
}