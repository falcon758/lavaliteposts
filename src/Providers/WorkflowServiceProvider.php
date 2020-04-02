<?php

namespace Channels\Postbuffer\Providers;

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
        'Channels\Postbuffer\Models\Post' => \Channels\Postbuffer\Workflow\PostValidator::class,

        // Bind Channel workflow validator
        'Channels\Postbuffer\Models\Channel' => \Channels\Postbuffer\Workflow\ChannelValidator::class,
    ];

    /**
     * The actions mappings for the package.
     *
     * @var array
     */
    protected $actions = [
        // Bind Post workflow actions
        'Channels\Postbuffer\Models\Post' => \Channels\Postbuffer\Workflow\PostAction::class,

        // Bind Channel workflow actions
        'Channels\Postbuffer\Models\Channel' => \Channels\Postbuffer\Workflow\ChannelAction::class,
    ];

    /**
     * The notifiers mappings for the package.
     *
     * @var array
     */
    protected $notifiers = [
       // Bind Post workflow notifiers
        'Channels\Postbuffer\Models\Post' => \Channels\Postbuffer\Workflow\PostNotifier::class,

        // Bind Channel workflow notifiers
        'Channels\Postbuffer\Models\Channel' => \Channels\Postbuffer\Workflow\ChannelNotifier::class,
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
