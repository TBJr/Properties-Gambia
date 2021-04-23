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
        Permission::create(['name' => 'Update Properties']);        
        Permission::create(['name' => 'Assign Properties']);
        Permission::create(['name' => 'Delete Properties']);
        Permission::create(['name' => 'Delete Profile']);

        // Create Roles and Assign Existing Permissions
        $role1 = Role::create(['name' => 'Client']);
        $role1->givePermissionTo('Update Profile');
        $role1->givePermissionTo('View Profile');

        $role2 = Role::create(['name' => 'Admin']);
        $role2->givePermissionTo('Update Profile');
        $role2->givePermissionTo('Update Client Info');
        $role2->givePermissionTo('Create Property');
        $role2->givePermissionTo('Update Properties');
        $role2->givePermissionTo('Assign Properties');
        $role2->givePermissionTo('Delete Properties');
        $role2->givePermissionTo('Delete Profile');
        $role2->givePermissionTo('View Profile');

        $role3 = Role::create(['name' => 'CEO']);
        $role3->givePermissionTo('Update Profile');
        $role3->givePermissionTo('Update Client Info');
        $role3->givePermissionTo('Create Property');
        $role3->givePermissionTo('Update Properties');
        $role3->givePermissionTo('Assign Properties');
        $role3->givePermissionTo('Delete Properties');
        $role3->givePermissionTo('Delete Profile');
        $role3->givePermissionTo('View Profile');

        $role4 = Role::create(['name' => 'Super-Admin']);
        // Gets all permissions via Gate::before rule; See AuthServiceProvider

        // Create Demo Users
        $user = \App\Models\User::factory()->create([
            'name' => 'TBJ',
            'fname' => 'Thomas',
            'mname' => 'S.',
            'lname' => 'Brown',
            'email' => 'tjaybrowne@gmail.com',
            'gender' => 'male',
            'role' => 'super-admin',
            'profession' => 'Developer',
            'phone' => '+1 (201) 590-7351',
        ]);
        $user->assignRole($role4);

        $user = \App\Models\User::factory()->create([
            'name' => '',
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
            'name' => '',
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
            'name' => '',
            'fname' => 'Omar',
            'mname' => '',
            'lname' => 'Jobe',
            'email' => 'jobeomar100@gmail.com',
            'gender' => 'male',
            'role' => 'admin',
            'profession' => 'Office Land Assistant',
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Cherno',
            'mname' => '',
            'lname' => 'Jallow',
            'email' => 'cherno.jallow@propertiesgambia.co.uk',
            'gender' => 'male',
            'role' => 'admin',
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Ebonie',
            'mname' => '',
            'lname' => 'Riley',
            'email' => 'noir1229@hotmail.com',
            'gender' => 'male',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Maureen',
            'mname' => '',
            'lname' => 'Graham',
            'email' => 'lotit@sky.com',
            'gender' => 'female',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Shirley',
            'mname' => '',
            'lname' => 'Fleming',
            'email' => 'shirlf01@hotmail.com',
            'gender' => 'female',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Tyra',
            'mname' => '',
            'lname' => 'West',
            'email' => 'tyrawest@gmail.com',
            'gender' => 'female',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Derrick',
            'mname' => 'A.',
            'lname' => 'Roach',
            'email' => 'antroyroach@gmail.com',
            'gender' => 'male',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Mavis',
            'mname' => '',
            'lname' => 'Shakespeare',
            'email' => 'mvshakes@yahoo.co.uk',
            'gender' => 'female',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Everton',
            'mname' => 'R.',
            'lname' => 'Matthews',
            'email' => 'everton.matthers1@gmail.com',
            'gender' => 'male',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Olrick',
            'mname' => '',
            'lname' => 'Harding',
            'email' => 'perfectionist.painting@yahoo.com',
            'gender' => 'male',
            'role' => 'client',
            'phone' => '+1 (732) 299-0437',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Andrea',
            'mname' => 'E.',
            'lname' => 'Gordon',
            'email' => 'andreae.gordon@yahoo.com',
            'gender' => 'female',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Gwendolyn',
            'mname' => 'J.',
            'lname' => 'Fisher',
            'email' => 'gwendolynfisher@me.com',
            'gender' => 'male',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Yoland',
            'mname' => '',
            'lname' => 'Kindred',
            'email' => 'yolandthomas@yahoo.com',
            'gender' => 'male',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Sharon',
            'mname' => '',
            'lname' => 'Powell',
            'email' => 'Sharonpowell926@gmail.com',
            'gender' => 'female',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Ebrima',
            'mname' => '',
            'lname' => 'Jobe',
            'email' => 'ebrima.jobe@gmail.com',
            'gender' => 'male',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Jacqueline',
            'mname' => '',
            'lname' => 'Adj-Omania',
            'email' => 'MsJacqueO@gmail.com',
            'gender' => 'female',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Ayat',
            'mname' => '',
            'lname' => 'Abe',
            'email' => 'therapomad@yahoo.com',
            'gender' => 'female',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Eulalee',
            'mname' => '',
            'lname' => 'Everett',
            'email' => 'eulaleee@yahoo.com',
            'gender' => 'female',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Kieron',
            'mname' => 'Stephanie',
            'lname' => 'Richards',
            'email' => 'kieronandsteph@yahoo.com',
            'gender' => 'male',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Dale',
            'mname' => '',
            'lname' => 'Vidal',
            'email' => 'd.vidal@live.com',
            'gender' => 'female',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Gerard',
            'mname' => 'A.',
            'lname' => 'Milner',
            'email' => 'alan_m99@yahoo.com',
            'gender' => 'male',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Terri',
            'mname' => 'lynn',
            'lname' => 'Milner',
            'email' => 'teruah888@gmail.com',
            'gender' => 'male',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Raymond',
            'mname' => '',
            'lname' => 'Green',
            'email' => 'raymondgreen2@gmail.com',
            'gender' => 'male',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Robyn',
            'mname' => '',
            'lname' => 'Payne',
            'email' => 'rpmssunshine168@gmail.com',
            'gender' => 'female',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Sheryl',
            'mname' => '',
            'lname' => 'Blake',
            'email' => 'smblake@blueyonder.co.uk',
            'gender' => 'female',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Robert',
            'mname' => '',
            'lname' => 'Walker',
            'email' => 'investinyourwealth@gmail.com',
            'gender' => 'male',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Dionne',
            'mname' => '',
            'lname' => 'Audain',
            'email' => 'dionneworks@gmail.com',
            'gender' => 'female',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Claytine',
            'mname' => '',
            'lname' => 'Nisbett',
            'email' => 'Cnjnisbett@yahoo.com',
            'gender' => 'female',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'David',
            'mname' => '',
            'lname' => 'Josephs',
            'email' => 'josephsdj71@gmail.com',
            'gender' => 'male',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Sharon',
            'mname' => '',
            'lname' => 'Gordon',
            'email' => 'Sharongordon11@gmail.com',
            'gender' => 'female',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Derek',
            'mname' => '',
            'lname' => 'Payne',
            'email' => 'derekdrpayne444@yahoo.com',
            'gender' => 'male',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Douglas',
            'mname' => '',
            'lname' => 'Harris',
            'email' => 'Rakaicari@gmail.com',
            'gender' => 'male',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Shamequa',
            'mname' => '',
            'lname' => 'Payne',
            'email' => 'Spayne197@yahoo.com',
            'gender' => 'male',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Angella',
            'mname' => '',
            'lname' => 'Josephs',
            'email' => 'angellinababe@hotmail.com',
            'gender' => 'female',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Preston',
            'mname' => '',
            'lname' => 'Anderson',
            'email' => 'Njeriuhuru50@gmail.com',
            'gender' => 'male',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Anthony',
            'mname' => '',
            'lname' => 'Thomas',
            'email' => 'Bhane724@gmail.com',
            'gender' => 'male',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Kay',
            'mname' => '',
            'lname' => 'Gilbert',
            'email' => 'Kay_gilbert@hotmail.co.uk',
            'gender' => 'male',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Kelly',
            'mname' => '',
            'lname' => 'Edwards',
            'email' => 'keleedwards@gmail.com',
            'gender' => 'male',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Charles',
            'mname' => '',
            'lname' => 'Currie',
            'email' => 'charlescurrie1@hotmail.com',
            'gender' => 'male',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Mark',
            'mname' => 'Lottie',
            'lname' => 'Holmes',
            'email' => 'marhol281@outlook.com',
            'gender' => 'male',
            'role' => 'client',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => '',
            'fname' => 'Patrick',
            'mname' => 'Lloyd',
            'lname' => 'McPherson',
            'email' => 'carib70@ hotmail.com',
            'gender' => 'male',
            'role' => 'client',
        ]);
        $user->assignRole($role1);
    }
}