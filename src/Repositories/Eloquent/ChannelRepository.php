<?php

namespace Channels\Postbuffer\Repositories\Eloquent;

use Channels\Postbuffer\Interfaces\ChannelRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class ChannelRepository extends BaseRepository implements ChannelRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('channels.postbuffer.channel.model.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('channels.postbuffer.channel.model.model');
    }
}
