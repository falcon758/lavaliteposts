<?php

namespace Channels\Postbuffer;

use User;

class Postbuffer
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
    public function __construct(\Channels\Postbuffer\Interfaces\PostRepositoryInterface $post,
        \Channels\Postbuffer\Interfaces\ChannelRepositoryInterface $channel)
    {
        $this->post = $post;
        $this->channel = $channel;
    }

    /**
     * Returns count of postbuffer.
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
            $this->post->pushCriteria(new \Litepie\Channels\Repositories\Criteria\PostUserCriteria());
        }

        $post = $this->post->scopeQuery(function ($query) use ($count) {
            return $query->orderBy('id', 'DESC')->take($count);
        })->all();

        return view('postbuffer::' . $view, compact('post'))->render();
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
            $this->channel->pushCriteria(new \Litepie\Channels\Repositories\Criteria\ChannelUserCriteria());
        }

        $channel = $this->channel->scopeQuery(function ($query) use ($count) {
            return $query->orderBy('id', 'DESC')->take($count);
        })->all();

        return view('postbuffer::' . $view, compact('channel'))->render();
    }
}
