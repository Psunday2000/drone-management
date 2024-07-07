<?php

namespace App\Console;

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
        // Your custom commands here
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            // Fetch all drones that are not active
            $drones = \App\Models\Drone::where('is_active', false)->get();

            foreach ($drones as $drone) {
                // Increase battery level by 1 (simulated charge every 30 minutes)
                $drone->battery_level += 1;

                // Ensure battery level does not exceed 100
                $drone->battery_level = min(100, $drone->battery_level);

                // Save the updated drone instance
                $drone->save();
            }

        })->everyThirtyMinutes(); // Run this task every 30 minutes
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
