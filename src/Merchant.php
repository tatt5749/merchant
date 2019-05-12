<?php

namespace Merchant\Merchant;

use User;

class Merchant
{
    /**
     * $merchant object.
     */
    protected $merchant;

    /**
     * Constructor.
     */
    public function __construct(\Merchant\Merchant\Interfaces\MerchantRepositoryInterface $merchant)
    {
        $this->merchant = $merchant;
    }

    /**
     * Returns count of merchant.
     *
     * @param array $filter
     *
     * @return int
     */
    public function count()
    {
        return  0;
    }

    /**
     * Make gadget View
     *
     * @param string $view
     *
     * @param int $count
     *
     * @return View
     */
    public function gadget($view = 'admin.merchant.gadget', $count = 10)
    {

        if (User::hasRole('user')) {
            $this->merchant->pushCriteria(new \Litepie\Merchant\Repositories\Criteria\MerchantUserCriteria());
        }

        $merchant = $this->merchant->scopeQuery(function ($query) use ($count) {
            return $query->orderBy('id', 'DESC')->take($count);
        })->all();

        return view('merchant::' . $view, compact('merchant'))->render();
    }
}
