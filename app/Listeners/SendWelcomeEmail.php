<?php

namespace App\Listeners;

use Mail;
use App\Events\SellerRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendWelcomeEmail
{

    public function handle(SellerRegistered $event)
    {
        $data = array('display_name'=>$event->user->display_name,'email'=>$event->user->email);
        $data['subject'] = "Welcome";
        Mail::send('emails.welcome', $data, function($message) use ($data) {
            $message->to($data['email'])
                    ->subject("Successfully Registered");
            $message->from('robil.sharma38@gmail.com');
        });
    }
}
