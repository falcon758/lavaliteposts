<?php

namespace Channels\Postbuffer\Workflow;

use Exception;
use Litepie\Workflow\Exceptions\WorkflowActionNotPerformedException;

use Channels\Postbuffer\Models\Post;

class PostAction
{
    /**
     * Perform the complete action.
     *
     * @param Post $post
     *
     * @return Post
     */
    public function complete(Post $post)
    {
        try {
            $post->status = 'complete';
            return $post->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the verify action.
     *
     * @param Post $post
     *
     * @return Post
     */public function verify(Post $post)
    {
        try {
            $post->status = 'verify';
            return $post->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the approve action.
     *
     * @param Post $post
     *
     * @return Post
     */public function approve(Post $post)
    {
        try {
            $post->status = 'approve';
            return $post->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the publish action.
     *
     * @param Post $post
     *
     * @return Post
     */public function publish(Post $post)
    {
        try {
            $post->status = 'publish';
            return $post->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the archive action.
     *
     * @param Post $post
     *
     * @return Post
     */
    public function archive(Post $post)
    {
        try {
            $post->status = 'archive';
            return $post->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the unpublish action.
     *
     * @param Post $post
     *
     * @return Post
     */
    public function unpublish(Post $post)
    {
        try {
            $post->status = 'unpublish';
            return $post->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }
}
