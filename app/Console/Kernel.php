<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;
use Symfony\Component\Console\Command\Command;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\DataReloadNonprofitTable::class,
        Commands\DataDownloadNonprofitFile::class,
        Commands\DataRenameNonprofitTable::class,
        Commands\DataImportFromSource::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('data:import')
            ->withoutOverlapping()
            ->daily()
            ->sendOutputTo(storage_path('logs/cli-output.txt'))
            ->emailOutputTo('howlowck@gmail.com');
    }
}
