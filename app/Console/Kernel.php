<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('pending:delete')->everyFifteenMinutes()->emailOutputOnFailure('valentino.janjac@gmail.com')->runInBackground();
        $schedule->command('dates:old')->daily()->emailOutputOnFailure('valentino.janjac@gmail.com')->runInBackground();
        $schedule->command('auth:clear-resets')->daily()->emailOutputOnFailure('valentino.janjac@gmail.com')->runInBackground();
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
