<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class everyDay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'day:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will update periodic db tables';

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
        
        DB::table('tasks')->where('periodic_nonperiodic','!=', 0 )->where('due_date', '<', now())->update([
            'due_date' => Carbon::now()->addDays(7),
            'picture' => NULL,
            'finished_at' => NULL,
            
            ]);
    }
 }
