<?php

namespace App\Listeners;

use Mail;
use App\Events\SellerRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailToAdmin
{
    public function handle(SellerRegistered $event)
    {
        $data = array('display_name'=>$event->user->display_name,'email'=>$event->user->email);
        Mail::send('emails.admin', $data, function($message) use ($data) {
            $message->to('robil271196@gmail.com')
                    ->subject("New Seller Registered. Please check and verify !!");
            $message->from('robil.sharma38@gmail.com');
        });
    }
}
