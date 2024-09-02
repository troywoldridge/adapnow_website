protected function schedule(Schedule $schedule)
{
    $schedule->command('sync:sinalite-products')->daily(); // Adjust frequency as needed
}

protected $commands = [
    \App\Console\Commands\SyncSinaLiteProducts::class,
];
