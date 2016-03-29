<?php

namespace App\Listeners;

use App\Events\DataSavedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DataSavedEventListener
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
     * @param  DataSavedEventHandler  $event
     * @return void
     */
    public function handle(DataSavedEvent $event)
    {
        \Log::info('Data Saved');
    }
}
