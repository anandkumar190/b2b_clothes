<?php

namespace App\Listeners;

use Mail;
use App\Events\UserBlocked;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SellerBlocked
{
    
    public function handle(UserBlocked $event)
    {
        $data = array('display_name' => $event->user->display_name, 'email' => $event->user->email, 'message' => $event->user->message,'type'=> $event->user->mail_type);
 
        Mail::send('emails.block', $data, function($message) use ($data) {
            $message->to($data['email'])
                    ->subject('Your Account has been blocked');
            $message->from('robil.sharma38@gmail.com');
        });
    }
}
