<?php

namespace Merchant\Merchant\Workflow;

use Merchant\Merchant\Models\Merchant;
use Merchant\Merchant\Notifications\MerchantWorkflow as MerchantNotifyer;
use Notification;

class MerchantNotification
{

    /**
     * Send the notification to the users after complete.
     *
     * @param Merchant $merchant
     *
     * @return void
     */
    public function complete(Merchant $merchant)
    {
        return Notification::send($merchant->user, new MerchantNotifyer($merchant, 'complete'));;
    }

    /**
     * Send the notification to the users after verify.
     *
     * @param Merchant $merchant
     *
     * @return void
     */
    public function verify(Merchant $merchant)
    {
        return Notification::send($merchant->user, new MerchantNotifyer($merchant, 'verify'));;
    }

    /**
     * Send the notification to the users after approve.
     *
     * @param Merchant $merchant
     *
     * @return void
     */
    public function approve(Merchant $merchant)
    {
        return Notification::send($merchant->user, new MerchantNotifyer($merchant, 'approve'));;

    }

    /**
     * Send the notification to the users after publish.
     *
     * @param Merchant $merchant
     *
     * @return void
     */
    public function publish(Merchant $merchant)
    {
        return Notification::send($merchant->user, new MerchantNotifyer($merchant, 'publish'));;
    }

    /**
     * Send the notification to the users after archive.
     *
     * @param Merchant $merchant
     *
     * @return void
     */
    public function archive(Merchant $merchant)
    {
        return Notification::send($merchant->user, new MerchantNotifyer($merchant, 'archive'));;

    }

    /**
     * Send the notification to the users after unpublish.
     *
     * @param Merchant $merchant
     *
     * @return void
     */
    public function unpublish(Merchant $merchant)
    {
        return Notification::send($merchant->user, new MerchantNotifyer($merchant, 'unpublish'));;

    }
}
