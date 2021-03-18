<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['title' => 'admin'],
            ['title' => 'user']
        ];

        foreach($roles as $role) {
            Role::create($role);
        }
    }
}
