<?php

namespace Postbuffer\Posts\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class PostItemPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PostItemTransformer();
    }
}