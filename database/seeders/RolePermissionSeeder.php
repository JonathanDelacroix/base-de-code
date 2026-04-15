<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        $role = Role::create(['name' => 'admin']);
        $permission = Permission::create(['name' => 'view dashboard']);

        $role->givePermissionTo($permission);
        $user = User::where('email', 'admin@example.com')->first();;
        $user->assignRole('admin');
    }
}
