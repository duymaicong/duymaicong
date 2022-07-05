<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use DB;
use App\Models\Comment as Comments;
use App\Exports\UsersExport;
use App\Mail\WellcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    public $count = 0;
    protected $commands = [
        'App\Console\Commands\PostCommand',
        'App\Console\Commands\updateExcel'
    ];
    protected function schedule(Schedule $schedule)
    {

        // $schedule->command('update:excel')->everyMinute();
        // $schedule->command('report:generate')->cron('*/100 * * * *');
        // $schedule->command('comment:create')->timezone('Asia/Bangkok')->dailyAt('10:30');
        $schedule->call(function () {
            Excel::store(new UsersExport, 'invoices.xlsx');

            $contents = Storage::get('file.txt');
            $contents = $contents + 1;
            Storage::put('file.txt', $contents);
            if ($contents%10==0) {
                Mail::to('maicongduy300393@gmail.com')->send(new WellcomeMail());  
            }


            // Excel::store(new UsersExport, 'invoices.xlsx');
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
