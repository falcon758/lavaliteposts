<?php

namespace Postbuffer\Posts\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class ChannelItemPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ChannelItemTransformer();
    }
}