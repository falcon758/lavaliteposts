<?php

namespace Channels\Postbuffer\Policies;

use Litepie\User\Contracts\UserPolicy;
use Channels\Postbuffer\Models\Channel;

class ChannelPolicy
{

    /**
     * Determine if the given user can view the channel.
     *
     * @param UserPolicy $user
     * @param Channel $channel
     *
     * @return bool
     */
    public function view(UserPolicy $user, Channel $channel)
    {
        if ($user->canDo('postbuffer.channel.view') && $user->isAdmin()) {
            return true;
        }

        return $channel->user_id == user_id() && $channel->user_type == user_type();
    }

    /**
     * Determine if the given user can create a channel.
     *
     * @param UserPolicy $user
     * @param Channel $channel
     *
     * @return bool
     */
    public function create(UserPolicy $user)
    {
        return  $user->canDo('postbuffer.channel.create');
    }

    /**
     * Determine if the given user can update the given channel.
     *
     * @param UserPolicy $user
     * @param Channel $channel
     *
     * @return bool
     */
    public function update(UserPolicy $user, Channel $channel)
    {
        if ($user->canDo('postbuffer.channel.edit') && $user->isAdmin()) {
            return true;
        }

        return $channel->user_id == user_id() && $channel->user_type == user_type();
    }

    /**
     * Determine if the given user can delete the given channel.
     *
     * @param UserPolicy $user
     * @param Channel $channel
     *
     * @return bool
     */
    public function destroy(UserPolicy $user, Channel $channel)
    {
        return $channel->user_id == user_id() && $channel->user_type == user_type();
    }

    /**
     * Determine if the given user can verify the given channel.
     *
     * @param UserPolicy $user
     * @param Channel $channel
     *
     * @return bool
     */
    public function verify(UserPolicy $user, Channel $channel)
    {
        if ($user->canDo('postbuffer.channel.verify')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given channel.
     *
     * @param UserPolicy $user
     * @param Channel $channel
     *
     * @return bool
     */
    public function approve(UserPolicy $user, Channel $channel)
    {
        if ($user->canDo('postbuffer.channel.approve')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the user can perform a given action ve.
     *
     * @param [type] $user    [description]
     * @param [type] $ability [description]
     *
     * @return [type] [description]
     */
    public function before($user, $ability)
    {
        if ($user->isSuperuser()) {
            return true;
        }
    }
}
