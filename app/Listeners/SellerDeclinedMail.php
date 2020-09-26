<?php

namespace App\Listeners;

use Mail;
use App\Events\SellerDeclined;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SellerDeclinedMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SellerDeclined  $event
     * @return void
     */
    public function handle(SellerDeclined $event)
    {
        $data = array('display_name' => $event->user->display_name, 'email' => $event->user->email, 'message' => $event->user->message,'type'=> $event->user->mail_type);
 
        Mail::send('emails.declined', $data, function($message) use ($data) {
            $message->to($data['email'])
                    ->subject('Your Account has been Declined');
            $message->from('robil.sharma38@gmail.com');
        });
    }
}
