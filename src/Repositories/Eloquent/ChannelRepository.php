<?php

namespace Postbuffer\Channels\Repositories\Eloquent;

use Postbuffer\Channels\Interfaces\ChannelRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class ChannelRepository extends BaseRepository implements ChannelRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('postbuffer.channels.channel.model.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('postbuffer.channels.channel.model.model');
    }
}
