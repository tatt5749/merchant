<?php

namespace Merchant\Merchant\Repositories\Eloquent;

use Merchant\Merchant\Interfaces\MerchantRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class MerchantRepository extends BaseRepository implements MerchantRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('merchant.merchant.merchant.model.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('merchant.merchant.merchant.model.model');
    }
}
