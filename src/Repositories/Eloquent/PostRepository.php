<?php

namespace Postbuffer\Channels\Repositories\Eloquent;

use Postbuffer\Channels\Interfaces\PostRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('postbuffer.channels.post.model.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('postbuffer.channels.post.model.model');
    }
}
