<?php

namespace Merchant\Merchant\Providers;

use Litepie\Contracts\Workflow\Workflow as WorkflowContract;
use Litepie\Foundation\Support\Providers\WorkflowServiceProvider as ServiceProvider;

class WorkflowServiceProvider extends ServiceProvider
{
    /**
     * The validators mappings for the package.
     *
     * @var array
     */
    protected $validators = [
        
        // Bind Merchant workflow validator
        'Merchant\Merchant\Models\Merchant' => \Merchant\Merchant\Workflow\MerchantValidator::class,
    ];

    /**
     * The actions mappings for the package.
     *
     * @var array
     */
    protected $actions = [
        
        // Bind Merchant workflow actions
        'Merchant\Merchant\Models\Merchant' => \Merchant\Merchant\Workflow\MerchantAction::class,
    ];

    /**
     * The notifiers mappings for the package.
     *
     * @var array
     */
    protected $notifiers = [
       
        // Bind Merchant workflow notifiers
        'Merchant\Merchant\Models\Merchant' => \Merchant\Merchant\Workflow\MerchantNotifier::class,
    ];

    /**
     * Register any package workflow validation services.
     *
     * @param \Litepie\Contracts\Workflow\Workflow $workflow
     *
     * @return void
     */
    public function boot(WorkflowContract $workflow)
    {
        parent::registerValidators($workflow);
        parent::registerActions($workflow);
        parent::registerNotifiers($workflow);
    }
}
