<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\RemindMail;
use App\Models\User;
use Carbon\Carbon;

class ReservationUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:reservationuser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send email to user after the reservation';

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
        $users = User::whereHas('reservations', function($query){
            $query->wheredate('reservation_date',Carbon::today());
        })->get();
        foreach($users as $user){
            return Mail::to($user->email)->send(new RemindMail($user));
        }
    }
}
