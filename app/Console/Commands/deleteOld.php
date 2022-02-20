<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use App\Models\Reservation;
use App\Models\DatesOff;


class deleteOld extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dates:old';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete old non working dates and old reservations';

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
        $past_date_time = Carbon::now()->subDays(2)->toDateString();
        Reservation::where('reservation_date', '<=', $past_date_time)->delete();
        DatesOff::where('noDate', '<=', $past_date_time)->delete();
    }
}
