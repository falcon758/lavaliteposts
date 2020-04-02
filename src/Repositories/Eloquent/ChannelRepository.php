<?php

namespace Posts\Posts\Repositories\Eloquent;

use Posts\Posts\Interfaces\ChannelRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class ChannelRepository extends BaseRepository implements ChannelRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('posts.posts.channel.model.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('posts.posts.channel.model.model');
    }
}
