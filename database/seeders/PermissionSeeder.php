<?php

namespace Database\Seeders;

use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            // Empty the session table
            DB::table('sessions')->truncate();
            // Reset cached roles and permissions
            app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
            foreach (config('permission.user_roles') as $role) {
                Role::findOrCreate($role);
            }
            foreach (config('permission.app_permissions') as $permission) {
                foreach (config('permission.app_cruds') as $crud) {
                    Permission::create([
                        'name' => $permission . '.' . $crud
                    ]);
                }
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
