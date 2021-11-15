<?php

namespace App\Listeners;

use App\Events\SomeOneCheckPostDetailsEvent;
use App\Jobs\SomeOneCheckPostDetailsJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SomeOneCheckPostDetailsListener implements ShouldQueue
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
     * @param  SomeOneCheckPostDetailsEvent  $event
     * @return void
     */
    public function handle(SomeOneCheckPostDetailsEvent $event)
    {
        SomeOneCheckPostDetailsJob::dispatch($event->post);
    }
}
