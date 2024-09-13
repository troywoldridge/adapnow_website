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
        \App\Console\Commands\FetchSinaliteProducts::class,
        \App\Console\Commands\SyncSinaLiteProducts::class,
        \App\Console\Commands\VerifyProductSlugs::class,
        \App\Console\Commands\FixProductImages::class,  // FixProductImages should be added here correctly
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
        $schedule->command('sinalite:fetch-products')->daily();  // Fetch products daily
        $schedule->command('sync:sinalite-products')->daily();   // Sync products daily
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

    protected function schedule(Schedule $schedule)
{
    $schedule->job(new FetchSinaliteProductsJob(new \App\Services\SinaliteService))->daily();
}

protected $commands = [
    \App\Console\Commands\FetchSinaliteProductsCommand::class,  // Register the command
];
protected $commands = [
    \App\Console\Commands\GenerateBladeFiles::class,
];
protected $commands = [
    \App\Console\Commands\FinalSyncWithSinalite::class,
];

 
}
