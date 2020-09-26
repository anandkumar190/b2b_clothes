<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SellerRegistered' => [
            'App\Listeners\SendWelcomeEmail',
            'App\Listeners\SendEmailToAdmin',
        ],
        'App\Events\UserBlocked' => [
            'App\Listeners\SellerBlocked',
        ],
        'App\Events\SellerApproved' => [
            'App\Listeners\SellerApprovedMail',
        ],
        'App\Events\SellerDeclined' => [
            'App\Listeners\SellerDeclinedMail',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
