<?php

namespace App\Listeners;

use App\Events\PostPublished;
use App\Mail\PostPublishedMail;
use App\Models\WebsiteSubscription;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendPostNotification implements ShouldQueue
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
     * @param  \App\Events\PostPublished  $event
     * @return void
     */
    public function handle(PostPublished $event)
    {        
        $post = $event->post;
        $websiteId = $post->website_id;
        $websiteSubscriptions = WebsiteSubscription::where('website_id', $websiteId)->get();
        foreach($websiteSubscriptions as $websiteSubscription) {
            Mail::to($websiteSubscription->email)->send(new PostPublishedMail($websiteSubscription->email, $post));
        }        
    }
}
