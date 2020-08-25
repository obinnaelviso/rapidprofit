<?php

use App\Models\Package;
use App\Models\Status;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status_id = Status::where('title', config('status.active'))->first()->id;
        $packages = [
            ['name' => 'amateur', 'min_amount' => 500, 'max_amount' =>1900, 'percentage' => 8, 'duration' => 7, 'status_id' => $status_id],
            ['name' => 'starter', 'min_amount' => 2000, 'max_amount' =>9900, 'gift_bonus' => 200, 'percentage' => 20, 'duration' => 30, 'status_id' => $status_id],
            ['name' => 'premium', 'min_amount' => 10000, 'max_amount' =>49000, 'gift_bonus' => 500, 'percentage' => 30, 'duration' => 30, 'status_id' => $status_id],
            ['name' => 'gold', 'min_amount' => 50000, 'max_amount' =>500000, 'gift_bonus' => 800, 'percentage' => 40, 'duration' => 30, 'status_id' => $status_id],
        ];

        foreach ($packages as $package) {
            Package::create($package);
        }
    }
}
