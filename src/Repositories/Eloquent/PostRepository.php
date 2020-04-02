<?php

namespace Posts\Posts\Repositories\Eloquent;

use Posts\Posts\Interfaces\PostRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('posts.posts.post.model.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('posts.posts.post.model.model');
    }
}
