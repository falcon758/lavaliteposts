<?php

namespace Posts\Posts\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class ChannelPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ChannelTransformer();
    }
}