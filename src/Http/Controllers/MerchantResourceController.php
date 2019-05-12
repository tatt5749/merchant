<?php

namespace Merchant\Merchant\Http\Controllers;

use App\Http\Controllers\ResourceController as BaseController;
use Form;
use Merchant\Merchant\Http\Requests\MerchantRequest;
use Merchant\Merchant\Interfaces\MerchantRepositoryInterface;
use Merchant\Merchant\Models\Merchant;

/**
 * Resource controller class for merchant.
 */
class MerchantResourceController extends BaseController
{

    /**
     * Initialize merchant resource controller.
     *
     * @param type MerchantRepositoryInterface $merchant
     *
     * @return null
     */
    public function __construct(MerchantRepositoryInterface $merchant)
    {
        parent::__construct();
        $this->repository = $merchant;
        $this->repository
            ->pushCriteria(\Litepie\Repository\Criteria\RequestCriteria::class)
            ->pushCriteria(\Merchant\Merchant\Repositories\Criteria\MerchantResourceCriteria::class);
    }

    /**
     * Display a list of merchant.
     *
     * @return Response
     */
    public function index(MerchantRequest $request)
    {
        $view = $this->response->theme->listView();

        if ($this->response->typeIs('json')) {
            $function = camel_case('get-' . $view);
            return $this->repository
                ->setPresenter(\Merchant\Merchant\Repositories\Presenter\MerchantPresenter::class)
                ->$function();
        }

        $merchants = $this->repository->paginate();

        return $this->response->title(trans('merchant::merchant.names'))
            ->view('merchant::merchant.index', true)
            ->data(compact('merchants'))
            ->output();
    }

    /**
     * Display merchant.
     *
     * @param Request $request
     * @param Model   $merchant
     *
     * @return Response
     */
    public function show(MerchantRequest $request, Merchant $merchant)
    {

        if ($merchant->exists) {
            $view = 'merchant::merchant.show';
        } else {
            $view = 'merchant::merchant.new';
        }

        return $this->response->title(trans('app.view') . ' ' . trans('merchant::merchant.name'))
            ->data(compact('merchant'))
            ->view($view, true)
            ->output();
    }

    /**
     * Show the form for creating a new merchant.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(MerchantRequest $request)
    {

        $merchant = $this->repository->newInstance([]);
        return $this->response->title(trans('app.new') . ' ' . trans('merchant::merchant.name')) 
            ->view('merchant::merchant.create', true) 
            ->data(compact('merchant'))
            ->output();
    }

    /**
     * Create new merchant.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(MerchantRequest $request)
    {
        try {
            $attributes              = $request->all();
            $attributes['user_id']   = user_id();
            $attributes['user_type'] = user_type();
            $merchant                 = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('merchant::merchant.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('merchant/merchant/' . $merchant->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('/merchant/merchant'))
                ->redirect();
        }

    }

    /**
     * Show merchant for editing.
     *
     * @param Request $request
     * @param Model   $merchant
     *
     * @return Response
     */
    public function edit(MerchantRequest $request, Merchant $merchant)
    {
        return $this->response->title(trans('app.edit') . ' ' . trans('merchant::merchant.name'))
            ->view('merchant::merchant.edit', true)
            ->data(compact('merchant'))
            ->output();
    }

    /**
     * Update the merchant.
     *
     * @param Request $request
     * @param Model   $merchant
     *
     * @return Response
     */
    public function update(MerchantRequest $request, Merchant $merchant)
    {
        try {
            $attributes = $request->all();

            $merchant->update($attributes);
            return $this->response->message(trans('messages.success.updated', ['Module' => trans('merchant::merchant.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('merchant/merchant/' . $merchant->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('merchant/merchant/' . $merchant->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove the merchant.
     *
     * @param Model   $merchant
     *
     * @return Response
     */
    public function destroy(MerchantRequest $request, Merchant $merchant)
    {
        try {

            $merchant->delete();
            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('merchant::merchant.name')]))
                ->code(202)
                ->status('success')
                ->url(guard_url('merchant/merchant/0'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('merchant/merchant/' . $merchant->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove multiple merchant.
     *
     * @param Model   $merchant
     *
     * @return Response
     */
    public function delete(MerchantRequest $request, $type)
    {
        try {
            $ids = hashids_decode($request->input('ids'));

            if ($type == 'purge') {
                $this->repository->purge($ids);
            } else {
                $this->repository->delete($ids);
            }

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('merchant::merchant.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('merchant/merchant'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/merchant/merchant'))
                ->redirect();
        }

    }

    /**
     * Restore deleted merchants.
     *
     * @param Model   $merchant
     *
     * @return Response
     */
    public function restore(MerchantRequest $request)
    {
        try {
            $ids = hashids_decode($request->input('ids'));
            $this->repository->restore($ids);

            return $this->response->message(trans('messages.success.restore', ['Module' => trans('merchant::merchant.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('/merchant/merchant'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/merchant/merchant/'))
                ->redirect();
        }

    }

}
