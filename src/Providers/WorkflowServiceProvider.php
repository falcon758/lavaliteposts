<?php

namespace Posts\Posts\Providers;

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
        // Bind Post workflow validator
        'Posts\Posts\Models\Post' => \Posts\Posts\Workflow\PostValidator::class,

        // Bind Channel workflow validator
        'Posts\Posts\Models\Channel' => \Posts\Posts\Workflow\ChannelValidator::class,
    ];

    /**
     * The actions mappings for the package.
     *
     * @var array
     */
    protected $actions = [
        // Bind Post workflow actions
        'Posts\Posts\Models\Post' => \Posts\Posts\Workflow\PostAction::class,

        // Bind Channel workflow actions
        'Posts\Posts\Models\Channel' => \Posts\Posts\Workflow\ChannelAction::class,
    ];

    /**
     * The notifiers mappings for the package.
     *
     * @var array
     */
    protected $notifiers = [
       // Bind Post workflow notifiers
        'Posts\Posts\Models\Post' => \Posts\Posts\Workflow\PostNotifier::class,

        // Bind Channel workflow notifiers
        'Posts\Posts\Models\Channel' => \Posts\Posts\Workflow\ChannelNotifier::class,
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
