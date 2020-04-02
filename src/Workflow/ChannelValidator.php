<?php

namespace Posts\Posts\Workflow;

use Posts\Posts\Models\Channel;
use Validator;

class ChannelValidator
{

    /**
     * Determine if the given channel is valid for complete status.
     *
     * @param Channel $channel
     *
     * @return bool / Validator
     */
    public function complete(Channel $channel)
    {
        return Validator::make($channel->toArray(), [
            'title' => 'required|min:15',
        ]);
    }

    /**
     * Determine if the given channel is valid for verify status.
     *
     * @param Channel $channel
     *
     * @return bool / Validator
     */
    public function verify(Channel $channel)
    {
        return Validator::make($channel->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:complete',
        ]);
    }

    /**
     * Determine if the given channel is valid for approve status.
     *
     * @param Channel $channel
     *
     * @return bool / Validator
     */
    public function approve(Channel $channel)
    {
        return Validator::make($channel->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:verify',
        ]);

    }

    /**
     * Determine if the given channel is valid for publish status.
     *
     * @param Channel $channel
     *
     * @return bool / Validator
     */
    public function publish(Channel $channel)
    {
        return Validator::make($channel->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,archive,unpublish',
        ]);

    }

    /**
     * Determine if the given channel is valid for archive status.
     *
     * @param Channel $channel
     *
     * @return bool / Validator
     */
    public function archive(Channel $channel)
    {
        return Validator::make($channel->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,publish,unpublish',
        ]);

    }

    /**
     * Determine if the given channel is valid for unpublish status.
     *
     * @param Channel $channel
     *
     * @return bool / Validator
     */
    public function unpublish(Channel $channel)
    {
        return Validator::make($channel->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:publish',
        ]);

    }
}
