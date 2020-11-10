<?php

namespace App\Console;

use App\Tasks\CheckInvestments;
<<<<<<< HEAD
=======
use App\Tasks\SendSummaryForTheMonth;
use App\Tasks\WithdrawalDateNotify;
>>>>>>> c8af4c4502f697f3e94eb2411d212dee0ab504cc
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->everyMinute();
        $schedule->call(new CheckInvestments)->everyTwoMinutes();

<<<<<<< HEAD
=======
        $schedule->call(new WithdrawalDateNotify)->lastDayOfMonth();
        $schedule->call(new SendSummaryForTheMonth)->monthly();

>>>>>>> c8af4c4502f697f3e94eb2411d212dee0ab504cc
        $schedule->command('queue:restart')
                 ->everyFiveMinutes();

        $schedule->command('queue:work --daemon')
                 ->everyMinute();
<<<<<<< HEAD
=======

>>>>>>> c8af4c4502f697f3e94eb2411d212dee0ab504cc
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
