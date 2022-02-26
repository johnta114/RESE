<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Reservation;
use Carbon\Carbon;

class RemindMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user=$user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $reservations = Reservation::where('user_id',$this->user->id)
                                    ->where('visited_at',null)
                                    ->where('reservation_date',Carbon::today()->toDateString())
                                    ->get();

        $items = [
            'user'=>$this->user,
            'reservations' =>$reservations
        ];
        return $this->view('email.reservationuser')
        ->with($items)->subject('【RESE】本日の予約確認');
    }
}
