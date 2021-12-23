<?php

namespace App\Listeners;

use App\Events\PostPublished;
use App\Events\UserNotified;
use App\Mail\PostPublishedMail;
use App\Models\UserNotification;
use App\Models\WebsiteSubscription;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class PostNotificationListener implements ShouldQueue
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
        foreach ($websiteSubscriptions as $websiteSubscription) {
            $email = $websiteSubscription->email;
            $postId = $post->id;
            $userAlreadyNotifieds = UserNotification::where('email', $email)->where('post_id', $postId)->get();
            if ($userAlreadyNotifieds == null || $userAlreadyNotifieds->isEmpty()) {
                Mail::to($websiteSubscription->email)->send(new PostPublishedMail($email, $post));
                $newUserNotification = new UserNotification();
                $newUserNotification->email = $email;
                $newUserNotification->post_id = $postId;
                UserNotified::dispatch($newUserNotification);
            }
        }
    }
}
