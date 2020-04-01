<?php

namespace Postbuffer\Posts\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the package.
     *
     * @var array
     */
    protected $policies = [
        // Bind Post policy
        'Postbuffer\Posts\Models\Post' => \Postbuffer\Posts\Policies\PostPolicy::class,
// Bind Channel policy
        'Postbuffer\Posts\Models\Channel' => \Postbuffer\Posts\Policies\ChannelPolicy::class,
    ];

    /**
     * Register any package authentication / authorization services.
     *
     * @param \Illuminate\Contracts\Auth\Access\Gate $gate
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        parent::registerPolicies($gate);
    }
}
