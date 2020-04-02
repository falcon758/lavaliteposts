<?php

namespace Channels\Postbuffer\Workflow;

use Channels\Postbuffer\Models\Channel;
use Channels\Postbuffer\Notifications\ChannelWorkflow as ChannelNotifyer;
use Notification;

class ChannelNotification
{

    /**
     * Send the notification to the users after complete.
     *
     * @param Channel $channel
     *
     * @return void
     */
    public function complete(Channel $channel)
    {
        return Notification::send($channel->user, new ChannelNotifyer($channel, 'complete'));;
    }

    /**
     * Send the notification to the users after verify.
     *
     * @param Channel $channel
     *
     * @return void
     */
    public function verify(Channel $channel)
    {
        return Notification::send($channel->user, new ChannelNotifyer($channel, 'verify'));;
    }

    /**
     * Send the notification to the users after approve.
     *
     * @param Channel $channel
     *
     * @return void
     */
    public function approve(Channel $channel)
    {
        return Notification::send($channel->user, new ChannelNotifyer($channel, 'approve'));;

    }

    /**
     * Send the notification to the users after publish.
     *
     * @param Channel $channel
     *
     * @return void
     */
    public function publish(Channel $channel)
    {
        return Notification::send($channel->user, new ChannelNotifyer($channel, 'publish'));;
    }

    /**
     * Send the notification to the users after archive.
     *
     * @param Channel $channel
     *
     * @return void
     */
    public function archive(Channel $channel)
    {
        return Notification::send($channel->user, new ChannelNotifyer($channel, 'archive'));;

    }

    /**
     * Send the notification to the users after unpublish.
     *
     * @param Channel $channel
     *
     * @return void
     */
    public function unpublish(Channel $channel)
    {
        return Notification::send($channel->user, new ChannelNotifyer($channel, 'unpublish'));;

    }
}
