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

        factory(App\User::class, 1)->create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'role_id' => 1
        ]);
    }
}
