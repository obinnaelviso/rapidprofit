<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            ['key' => 'general',
                'value' => json_encode([
                    'min_dep' => 100,
                    'max_dep' => 1000000,
                    'min_with' => 100,
                    'max_with' => 1000000,
                    'referrer_bon' => 10,
                    'referred_bon' => 5,
                    'referral_limit' => 100
                ]),
                'user_id' => null
            ],
            ['key' => 'homepage',
                'value' => json_encode([
                    'active_investors' => 400000,
                    'active_invest' => 10000000,
                    'average_dep' => 100000000,
                    'average_pay' => 100000000,
                    'facebook' => 'https://facebook.com',
                    'twitter' => 'https://twitter.com',
                    'instagram' => 'https://instagram.com',
                    'telegram' => 'https://telegram.com'
                ]),
                'user_id' => null
            ]
        ];

        foreach($settings as $setting) {
            Setting::create($setting);
        }
    }
}
