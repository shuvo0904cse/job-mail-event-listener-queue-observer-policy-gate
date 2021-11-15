<?php

namespace App\Providers;

use App\Events\SomeOneCheckPostDetailsEvent;
use App\Events\SomeOneCommentOnPostEvent;
use App\Listeners\SomeOneCheckPostDetailsListener;
use App\Listeners\SomeOneCommentOnPostListener;
use App\Models\Post;
use App\Observers\PostObserver;
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
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SomeOneCheckPostDetailsEvent::class => [
            SomeOneCheckPostDetailsListener::class
        ],
        SomeOneCommentOnPostEvent::class => [
            SomeOneCommentOnPostListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Post::observe(PostObserver::class);
    }
}
