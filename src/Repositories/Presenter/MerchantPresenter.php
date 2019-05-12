<?php

namespace Merchant\Merchant\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class MerchantPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MerchantTransformer();
    }
}