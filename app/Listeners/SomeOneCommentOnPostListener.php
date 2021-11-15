<?php

namespace App\Listeners;

use App\Events\SomeOneCommentOnPostEvent;
use App\Mail\SomeOneCommentOnPostMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SomeOneCommentOnPostListener implements ShouldQueue
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
     * @param  SomeOneCommentOnPostEvent  $event
     * @return void
     */
    public function handle(SomeOneCommentOnPostEvent $event)
    {
        Mail::to("admin@gmail.com")->send(new SomeOneCommentOnPostMail($event->post));
    }
}
