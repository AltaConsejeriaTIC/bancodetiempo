<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\DealsController;
use App\Http\Controllers\CampaignController;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function (){
            $email = new EmailController();
            $email->sendMailDaily();
        })->twiceDaily(1);

        $schedule->call(function (){
            $deals = new DealsController();
            $deals->exchangeForTime();
        })->hourly();

        $schedule->call(function (){
            $campaign = new CampaignController();
            $campaign->sendReminder();
        })->everyMinute();

        $schedule->call(function (){
            $campaign = new CampaignController();
            $campaign->changeState();
        })->everyMinute();

        $schedule->call(function (){
            $campaign = new CampaignController();
            $campaign->enableInscriptions();
        })->everyMinute();

    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
