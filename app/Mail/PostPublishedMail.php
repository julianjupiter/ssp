<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostPublishedMail extends Mailable
{
    use Queueable, SerializesModels;

    private $email;
    private Post $post;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, Post $post)
    {
        $this->email = $email;
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("admin@example.com")
            ->subject('Post Published - ' . $this->post->title)
            ->view('emails.post_published')
            ->with(['email' => $this->email, 'post' => $this->post]);
    }
}
