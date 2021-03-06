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
        $this->call(StatusSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PackageSeeder::class);
        $this->call(SettingsSeeder::class);
    }
}
