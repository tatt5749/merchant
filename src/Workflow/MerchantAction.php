<?php

namespace Merchant\Merchant\Workflow;

use Exception;
use Litepie\Workflow\Exceptions\WorkflowActionNotPerformedException;

use Merchant\Merchant\Models\Merchant;

class MerchantAction
{
    /**
     * Perform the complete action.
     *
     * @param Merchant $merchant
     *
     * @return Merchant
     */
    public function complete(Merchant $merchant)
    {
        try {
            $merchant->status = 'complete';
            return $merchant->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the verify action.
     *
     * @param Merchant $merchant
     *
     * @return Merchant
     */public function verify(Merchant $merchant)
    {
        try {
            $merchant->status = 'verify';
            return $merchant->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the approve action.
     *
     * @param Merchant $merchant
     *
     * @return Merchant
     */public function approve(Merchant $merchant)
    {
        try {
            $merchant->status = 'approve';
            return $merchant->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the publish action.
     *
     * @param Merchant $merchant
     *
     * @return Merchant
     */public function publish(Merchant $merchant)
    {
        try {
            $merchant->status = 'publish';
            return $merchant->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the archive action.
     *
     * @param Merchant $merchant
     *
     * @return Merchant
     */
    public function archive(Merchant $merchant)
    {
        try {
            $merchant->status = 'archive';
            return $merchant->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the unpublish action.
     *
     * @param Merchant $merchant
     *
     * @return Merchant
     */
    public function unpublish(Merchant $merchant)
    {
        try {
            $merchant->status = 'unpublish';
            return $merchant->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }
}
