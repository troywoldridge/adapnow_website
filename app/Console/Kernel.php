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
        // Register your custom commands here
       
       
        \App\Console\Commands\VerifyProductSlugs::class,
        \App\Console\Commands\FixProductImages::class,
        \App\Console\Commands\ExportProductSlugs::class,  // Register the ExportProductSlugs command here
        \App\Console\Commands\GenerateBladeFiles::class,
        
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Schedule the commands
        //$schedule->command('sinalite:fetch-products')->daily();  // Fetch products daily
       // $schedule->command('sync:sinalite-products')->daily();   // Sync products daily
        //$schedule->job(new FetchSinaliteProductsJob(new \App\Services\SinaliteService))->daily();
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
