<?php

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            ['title' => 'pending'],
            ['title' => 'completed'],
            ['title' => 'inactive'],
            ['title' => 'active'],
            ['title' => 'expired'],
        ];

        foreach($statuses as $status) {
            Status::create($status);
        }
    }
}
