<?php

namespace Postbuffer\Channels\Providers;

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
        'Postbuffer\Channels\Models\Post' => \Postbuffer\Channels\Policies\PostPolicy::class,
// Bind Channel policy
        'Postbuffer\Channels\Models\Channel' => \Postbuffer\Channels\Policies\ChannelPolicy::class,
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
