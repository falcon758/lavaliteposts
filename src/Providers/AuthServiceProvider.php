<?php

namespace Channels\Postbuffer\Providers;

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
        'Channels\Postbuffer\Models\Post' => \Channels\Postbuffer\Policies\PostPolicy::class,
// Bind Channel policy
        'Channels\Postbuffer\Models\Channel' => \Channels\Postbuffer\Policies\ChannelPolicy::class,
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
