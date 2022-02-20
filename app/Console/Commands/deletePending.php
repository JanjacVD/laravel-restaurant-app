<?php

namespace App\Console\Commands;
use App\Models\PendingReservation;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class deletePending extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pending:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command deletes old pending reservation requests';

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
        $current_date_time = Carbon::now()->subMinutes(15)->toDateTimeString();
        PendingReservation::where('created_at', '<=', $current_date_time)->delete();
    }
}
