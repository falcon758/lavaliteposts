<?php

namespace Postbuffer\Posts\Repositories\Eloquent;

use Postbuffer\Posts\Interfaces\ChannelRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class ChannelRepository extends BaseRepository implements ChannelRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('postbuffer.posts.channel.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('postbuffer.posts.channel.model.model');
    }
}
