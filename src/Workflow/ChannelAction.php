<?php

namespace Channels\Postbuffer\Workflow;

use Exception;
use Litepie\Workflow\Exceptions\WorkflowActionNotPerformedException;

use Channels\Postbuffer\Models\Channel;

class ChannelAction
{
    /**
     * Perform the complete action.
     *
     * @param Channel $channel
     *
     * @return Channel
     */
    public function complete(Channel $channel)
    {
        try {
            $channel->status = 'complete';
            return $channel->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the verify action.
     *
     * @param Channel $channel
     *
     * @return Channel
     */public function verify(Channel $channel)
    {
        try {
            $channel->status = 'verify';
            return $channel->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the approve action.
     *
     * @param Channel $channel
     *
     * @return Channel
     */public function approve(Channel $channel)
    {
        try {
            $channel->status = 'approve';
            return $channel->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the publish action.
     *
     * @param Channel $channel
     *
     * @return Channel
     */public function publish(Channel $channel)
    {
        try {
            $channel->status = 'publish';
            return $channel->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the archive action.
     *
     * @param Channel $channel
     *
     * @return Channel
     */
    public function archive(Channel $channel)
    {
        try {
            $channel->status = 'archive';
            return $channel->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the unpublish action.
     *
     * @param Channel $channel
     *
     * @return Channel
     */
    public function unpublish(Channel $channel)
    {
        try {
            $channel->status = 'unpublish';
            return $channel->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }
}
