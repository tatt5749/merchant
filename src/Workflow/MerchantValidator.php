<?php

namespace Merchant\Merchant\Workflow;

use Merchant\Merchant\Models\Merchant;
use Validator;

class MerchantValidator
{

    /**
     * Determine if the given merchant is valid for complete status.
     *
     * @param Merchant $merchant
     *
     * @return bool / Validator
     */
    public function complete(Merchant $merchant)
    {
        return Validator::make($merchant->toArray(), [
            'title' => 'required|min:15',
        ]);
    }

    /**
     * Determine if the given merchant is valid for verify status.
     *
     * @param Merchant $merchant
     *
     * @return bool / Validator
     */
    public function verify(Merchant $merchant)
    {
        return Validator::make($merchant->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:complete',
        ]);
    }

    /**
     * Determine if the given merchant is valid for approve status.
     *
     * @param Merchant $merchant
     *
     * @return bool / Validator
     */
    public function approve(Merchant $merchant)
    {
        return Validator::make($merchant->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:verify',
        ]);

    }

    /**
     * Determine if the given merchant is valid for publish status.
     *
     * @param Merchant $merchant
     *
     * @return bool / Validator
     */
    public function publish(Merchant $merchant)
    {
        return Validator::make($merchant->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,archive,unpublish',
        ]);

    }

    /**
     * Determine if the given merchant is valid for archive status.
     *
     * @param Merchant $merchant
     *
     * @return bool / Validator
     */
    public function archive(Merchant $merchant)
    {
        return Validator::make($merchant->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,publish,unpublish',
        ]);

    }

    /**
     * Determine if the given merchant is valid for unpublish status.
     *
     * @param Merchant $merchant
     *
     * @return bool / Validator
     */
    public function unpublish(Merchant $merchant)
    {
        return Validator::make($merchant->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:publish',
        ]);

    }
}
