<?php

namespace Merchant\Merchant\Policies;

use Litepie\User\Contracts\UserPolicy;
use Merchant\Merchant\Models\Merchant;

class MerchantPolicy
{

    /**
     * Determine if the given user can view the merchant.
     *
     * @param UserPolicy $user
     * @param Merchant $merchant
     *
     * @return bool
     */
    public function view(UserPolicy $user, Merchant $merchant)
    {
        if ($user->canDo('merchant.merchant.view') && $user->isAdmin()) {
            return true;
        }

        return $merchant->user_id == user_id() && $merchant->user_type == user_type();
    }

    /**
     * Determine if the given user can create a merchant.
     *
     * @param UserPolicy $user
     * @param Merchant $merchant
     *
     * @return bool
     */
    public function create(UserPolicy $user)
    {
        return  $user->canDo('merchant.merchant.create');
    }

    /**
     * Determine if the given user can update the given merchant.
     *
     * @param UserPolicy $user
     * @param Merchant $merchant
     *
     * @return bool
     */
    public function update(UserPolicy $user, Merchant $merchant)
    {
        if ($user->canDo('merchant.merchant.edit') && $user->isAdmin()) {
            return true;
        }

        return $merchant->user_id == user_id() && $merchant->user_type == user_type();
    }

    /**
     * Determine if the given user can delete the given merchant.
     *
     * @param UserPolicy $user
     * @param Merchant $merchant
     *
     * @return bool
     */
    public function destroy(UserPolicy $user, Merchant $merchant)
    {
        return $merchant->user_id == user_id() && $merchant->user_type == user_type();
    }

    /**
     * Determine if the given user can verify the given merchant.
     *
     * @param UserPolicy $user
     * @param Merchant $merchant
     *
     * @return bool
     */
    public function verify(UserPolicy $user, Merchant $merchant)
    {
        if ($user->canDo('merchant.merchant.verify')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given merchant.
     *
     * @param UserPolicy $user
     * @param Merchant $merchant
     *
     * @return bool
     */
    public function approve(UserPolicy $user, Merchant $merchant)
    {
        if ($user->canDo('merchant.merchant.approve')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the user can perform a given action ve.
     *
     * @param [type] $user    [description]
     * @param [type] $ability [description]
     *
     * @return [type] [description]
     */
    public function before($user, $ability)
    {
        if ($user->isSuperuser()) {
            return true;
        }
    }
}
