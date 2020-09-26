<?php

namespace App\Listeners;

use Mail;
use App\Events\SellerApproved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SellerApprovedMail
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
     * @param  SellerApproved  $event
     * @return void
     */
    public function handle(SellerApproved $event)
    {
        $data = array('display_name' => $event->user->display_name, 'email' => $event->user->email);
 
        Mail::send('emails.approved', $data, function($message) use ($data) {
            $message->to($data['email'])
                    ->subject('Your Account has been Approved');
            $message->from('robil.sharma38@gmail.com');
        });
    }
}
