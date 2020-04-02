<?php

namespace Postbuffer\Channels\Policies;

use Litepie\User\Contracts\UserPolicy;
use Postbuffer\Channels\Models\Post;

class PostPolicy
{

    /**
     * Determine if the given user can view the post.
     *
     * @param UserPolicy $user
     * @param Post $post
     *
     * @return bool
     */
    public function view(UserPolicy $user, Post $post)
    {
        if ($user->canDo('channels.post.view') && $user->isAdmin()) {
            return true;
        }

        return $post->user_id == user_id() && $post->user_type == user_type();
    }

    /**
     * Determine if the given user can create a post.
     *
     * @param UserPolicy $user
     * @param Post $post
     *
     * @return bool
     */
    public function create(UserPolicy $user)
    {
        return  $user->canDo('channels.post.create');
    }

    /**
     * Determine if the given user can update the given post.
     *
     * @param UserPolicy $user
     * @param Post $post
     *
     * @return bool
     */
    public function update(UserPolicy $user, Post $post)
    {
        if ($user->canDo('channels.post.edit') && $user->isAdmin()) {
            return true;
        }

        return $post->user_id == user_id() && $post->user_type == user_type();
    }

    /**
     * Determine if the given user can delete the given post.
     *
     * @param UserPolicy $user
     * @param Post $post
     *
     * @return bool
     */
    public function destroy(UserPolicy $user, Post $post)
    {
        return $post->user_id == user_id() && $post->user_type == user_type();
    }

    /**
     * Determine if the given user can verify the given post.
     *
     * @param UserPolicy $user
     * @param Post $post
     *
     * @return bool
     */
    public function verify(UserPolicy $user, Post $post)
    {
        if ($user->canDo('channels.post.verify')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given post.
     *
     * @param UserPolicy $user
     * @param Post $post
     *
     * @return bool
     */
    public function approve(UserPolicy $user, Post $post)
    {
        if ($user->canDo('channels.post.approve')) {
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
