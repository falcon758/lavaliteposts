<?php

namespace Postbuffer\Channels\Providers;

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
        'Postbuffer\Channels\Models\Post' => \Postbuffer\Channels\Workflow\PostValidator::class,

        // Bind Channel workflow validator
        'Postbuffer\Channels\Models\Channel' => \Postbuffer\Channels\Workflow\ChannelValidator::class,
    ];

    /**
     * The actions mappings for the package.
     *
     * @var array
     */
    protected $actions = [
        // Bind Post workflow actions
        'Postbuffer\Channels\Models\Post' => \Postbuffer\Channels\Workflow\PostAction::class,

        // Bind Channel workflow actions
        'Postbuffer\Channels\Models\Channel' => \Postbuffer\Channels\Workflow\ChannelAction::class,
    ];

    /**
     * The notifiers mappings for the package.
     *
     * @var array
     */
    protected $notifiers = [
       // Bind Post workflow notifiers
        'Postbuffer\Channels\Models\Post' => \Postbuffer\Channels\Workflow\PostNotifier::class,

        // Bind Channel workflow notifiers
        'Postbuffer\Channels\Models\Channel' => \Postbuffer\Channels\Workflow\ChannelNotifier::class,
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
