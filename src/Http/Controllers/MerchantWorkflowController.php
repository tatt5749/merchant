<?php

namespace Merchant\Merchant\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Merchant\Merchant\Http\Requests\MerchantRequest;
use Merchant\Merchant\Models\Merchant;

/**
 * Admin web controller class.
 */
class MerchantWorkflowController extends BaseController
{

    /**
     * Workflow controller function for merchant.
     *
     * @param Model   $merchant
     * @param step    next step for the workflow.
     *
     * @return Response
     */

    public function putWorkflow(MerchantRequest $request, Merchant $merchant, $step)
    {

        try {

            $merchant->updateWorkflow($step);

            return response()->json([
                'message'  => trans('messages.success.changed', ['Module' => trans('merchant::merchant.name'), 'status' => trans("app.{$step}")]),
                'code'     => 204,
                'redirect' => trans_url('/admin/merchant/merchant/' . $merchant->getRouteKey()),
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/merchant/merchant/' . $merchant->getRouteKey()),
            ], 400);

        }

    }

    /**
     * Workflow controller function for merchant.
     *
     * @param Model   $merchant
     * @param step    next step for the workflow.
     * @param user    encrypted user id.
     *
     * @return Response
     */

    public function getWorkflow(Merchant $merchant, $step, $user)
    {
        try {
            $user_id = decrypt($user);

            Auth::onceUsingId($user_id);

            $merchant->updateWorkflow($step);

            $data = [
                'message' => trans('messages.success.changed', ['Module' => trans('merchant::merchant.name'), 'status' => trans("app.{$step}")]),
                'status'  => 'success',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('merchant::admin.merchant.message', $data)->render();

        } catch (ValidationException $e) {

            $data = [
                'message' => '<b>' . $e->getMessage() . '</b> <br /><br />' . implode('<br />', $e->validator->errors()->all()),
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('merchant::admin.merchant.message', $data)->render();

        } catch (Exception $e) {

            $data = [
                'message' => '<b>' . $e->getMessage() . '</b>',
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('merchant::admin.merchant.message', $data)->render();

        }

    }
}
