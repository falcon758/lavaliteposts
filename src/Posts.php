<?php

namespace Postbuffer\Posts;

use User;

class Posts
{
    /**
     * $post object.
     */
    protected $post;
    /**
     * $channel object.
     */
    protected $channel;

    /**
     * Constructor.
     */
    public function __construct(\Postbuffer\Posts\Interfaces\PostRepositoryInterface $post,
        \Postbuffer\Posts\Interfaces\ChannelRepositoryInterface $channel)
    {
        $this->post = $post;
        $this->channel = $channel;
    }

    /**
     * Returns count of posts.
     *
     * @param array $filter
     *
     * @return int
     */
    public function count()
    {
        return  0;
    }

    /**
     * Make gadget View
     *
     * @param string $view
     *
     * @param int $count
     *
     * @return View
     */
    public function gadget($view = 'admin.post.gadget', $count = 10)
    {

        if (User::hasRole('user')) {
            $this->post->pushCriteria(new \Litepie\Postbuffer\Repositories\Criteria\PostUserCriteria());
        }

        $post = $this->post->scopeQuery(function ($query) use ($count) {
            return $query->orderBy('id', 'DESC')->take($count);
        })->all();

        return view('posts::' . $view, compact('post'))->render();
    }
    /**
     * Make gadget View
     *
     * @param string $view
     *
     * @param int $count
     *
     * @return View
     */
    public function gadget($view = 'admin.channel.gadget', $count = 10)
    {

        if (User::hasRole('user')) {
            $this->channel->pushCriteria(new \Litepie\Postbuffer\Repositories\Criteria\ChannelUserCriteria());
        }

        $channel = $this->channel->scopeQuery(function ($query) use ($count) {
            return $query->orderBy('id', 'DESC')->take($count);
        })->all();

        return view('posts::' . $view, compact('channel'))->render();
    }
}
