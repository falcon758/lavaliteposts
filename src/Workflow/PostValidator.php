<?php

namespace Channels\Postbuffer\Workflow;

use Channels\Postbuffer\Models\Post;
use Validator;

class PostValidator
{

    /**
     * Determine if the given post is valid for complete status.
     *
     * @param Post $post
     *
     * @return bool / Validator
     */
    public function complete(Post $post)
    {
        return Validator::make($post->toArray(), [
            'title' => 'required|min:15',
        ]);
    }

    /**
     * Determine if the given post is valid for verify status.
     *
     * @param Post $post
     *
     * @return bool / Validator
     */
    public function verify(Post $post)
    {
        return Validator::make($post->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:complete',
        ]);
    }

    /**
     * Determine if the given post is valid for approve status.
     *
     * @param Post $post
     *
     * @return bool / Validator
     */
    public function approve(Post $post)
    {
        return Validator::make($post->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:verify',
        ]);

    }

    /**
     * Determine if the given post is valid for publish status.
     *
     * @param Post $post
     *
     * @return bool / Validator
     */
    public function publish(Post $post)
    {
        return Validator::make($post->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,archive,unpublish',
        ]);

    }

    /**
     * Determine if the given post is valid for archive status.
     *
     * @param Post $post
     *
     * @return bool / Validator
     */
    public function archive(Post $post)
    {
        return Validator::make($post->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,publish,unpublish',
        ]);

    }

    /**
     * Determine if the given post is valid for unpublish status.
     *
     * @param Post $post
     *
     * @return bool / Validator
     */
    public function unpublish(Post $post)
    {
        return Validator::make($post->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:publish',
        ]);

    }
}
