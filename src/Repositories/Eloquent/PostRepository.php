<?php

namespace Channels\Postbuffer\Repositories\Eloquent;

use Channels\Postbuffer\Interfaces\PostRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('channels.postbuffer.post.model.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('channels.postbuffer.post.model.model');
    }
}
