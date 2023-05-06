<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'is_employee' => 0,
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin@123'),
        ]);

        $admin_role = Role::create([
                        'name'=>'Admin',
                        'guard_name'=>'web',
                    ]);

        $permissions = [
            'role-list', 'role-create', 'role-edit', 'role-delete',
            'permission-list', 'permission-create', 'permission-edit', 'permission-delete',
            'user-list', 'user-create', 'user-edit', 'user-delete',
            'logactivity-list', 'logactivity-create', 'logactivity-edit', 'logactivity-delete',
        ];
        foreach ($permissions as $permission) {
            $label = explode('-', $permission);
            Permission::create([
                'label' => $label[0],
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }
        $permissions = Permission::get();
        $admin_role->givePermissionTo($permissions);
        $admin->assignRole($admin_role);
    }
}
