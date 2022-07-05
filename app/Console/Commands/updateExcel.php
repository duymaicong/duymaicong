<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class updateExcel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:excel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update file excel';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public $excelFile;
    public function handle()
    {
        $excelFile=Excel::store(new UsersExport, 'invoices.xlsx');

        // return Excel::download(new UsersExport, 'excel.xlsx');
        
    
    }
}
