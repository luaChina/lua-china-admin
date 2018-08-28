<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\App\Repositories\AdminRepository $adminRepository, \App\Repositories\AdminPermissionRepository $adminPermissionRepository)
    {
        $admin = $adminRepository->create([
            'name'     => 'horan',
            'email'    => env('ADMIN_EMAIL'),
            'password' => bcrypt(env('ADMIN_PASSWORD')),
        ]);
        foreach (config('permission') as $permission) {
            $adminPermissionRepository->create([
                'admin_id' => $admin->id,
                'permission_id' => $permission['id'],
            ]);
        }
    }
}
