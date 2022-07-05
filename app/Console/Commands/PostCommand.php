<?php

namespace App\Console\Commands;

use App\Mail\WellcomeMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Models\Comment as Comments;
use Swift_Attachment;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
class PostCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature =  'report:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'report email';

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
    public function handle()
    {
       
      Mail::to('maicongduy300393@gmail.com')->send(new WellcomeMail());  
    }
}
