<?php

namespace Merchant\Merchant\Facades;

use Illuminate\Support\Facades\Facade;

class Merchant extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'merchant.merchant';
    }
}
