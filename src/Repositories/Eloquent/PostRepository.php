<?php

namespace Postbuffer\Posts\Repositories\Eloquent;

use Postbuffer\Posts\Interfaces\PostRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('postbuffer.posts.post.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('postbuffer.posts.post.model.model');
    }
}
