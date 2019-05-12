<?php

namespace Merchant\Merchant\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class MerchantTransformer extends TransformerAbstract
{
    public function transform(\Merchant\Merchant\Models\Merchant $merchant)
    {
        return [
            'id'                => $merchant->getRouteKey(),
            'key'               => [
                'public'    => $merchant->getPublicKey(),
                'route'     => $merchant->getRouteKey(),
            ], 
            'id'                => $merchant->id,
            'merchant_name'     => $merchant->merchant_name,
            'username'          => $merchant->username,
            'password'          => $merchant->password,
            'email'             => $merchant->email,
            'address'           => $merchant->address,
            'information'       => $merchant->information,
            'img'               => $merchant->img,
            'phone'             => $merchant->phone,
            'url'               => [
                'public'    => trans_url('merchant/'.$merchant->getPublicKey()),
                'user'      => guard_url('merchant/merchant/'.$merchant->getRouteKey()),
            ], 
            'status'            => trans('app.'.$merchant->status),
            'created_at'        => format_date($merchant->created_at),
            'updated_at'        => format_date($merchant->updated_at),
        ];
    }
}