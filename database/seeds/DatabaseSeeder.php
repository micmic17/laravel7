<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['admin', 'users'];

        factory(App\Role::class, 2)->create()->each(function($role, $index) use($roles) {
            $role->name = $roles[$index];
            $role->save();
        });

        factory(App\User::class, 2)->create()->each(function($user, $index) {
            if ($index == 0) {
                $user->name = 'Admin User';
                $user->email = 'admin@admin.com';
                $user->role_id = 1;
            } else {
                $user->name = 'User Test';
                $user->email = 'test@tes.com';
                $user->role_id = 2;
            }

            $user->save();
        });
    }
}
