<?php

namespace Postbuffer\Posts\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class PostListPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PostListTransformer();
    }
}