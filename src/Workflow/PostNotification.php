<?php

namespace Postbuffer\Channels\Workflow;

use Postbuffer\Channels\Models\Post;
use Postbuffer\Channels\Notifications\PostWorkflow as PostNotifyer;
use Notification;

class PostNotification
{

    /**
     * Send the notification to the users after complete.
     *
     * @param Post $post
     *
     * @return void
     */
    public function complete(Post $post)
    {
        return Notification::send($post->user, new PostNotifyer($post, 'complete'));;
    }

    /**
     * Send the notification to the users after verify.
     *
     * @param Post $post
     *
     * @return void
     */
    public function verify(Post $post)
    {
        return Notification::send($post->user, new PostNotifyer($post, 'verify'));;
    }

    /**
     * Send the notification to the users after approve.
     *
     * @param Post $post
     *
     * @return void
     */
    public function approve(Post $post)
    {
        return Notification::send($post->user, new PostNotifyer($post, 'approve'));;

    }

    /**
     * Send the notification to the users after publish.
     *
     * @param Post $post
     *
     * @return void
     */
    public function publish(Post $post)
    {
        return Notification::send($post->user, new PostNotifyer($post, 'publish'));;
    }

    /**
     * Send the notification to the users after archive.
     *
     * @param Post $post
     *
     * @return void
     */
    public function archive(Post $post)
    {
        return Notification::send($post->user, new PostNotifyer($post, 'archive'));;

    }

    /**
     * Send the notification to the users after unpublish.
     *
     * @param Post $post
     *
     * @return void
     */
    public function unpublish(Post $post)
    {
        return Notification::send($post->user, new PostNotifyer($post, 'unpublish'));;

    }
}
