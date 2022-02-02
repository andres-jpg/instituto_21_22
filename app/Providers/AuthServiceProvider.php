<?php

namespace App\Providers;

use App\Models\Centro;
use App\Policies\CentroPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\CentroPolicy;
use App\Models\Centro;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
<<<<<<< HEAD
=======
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
>>>>>>> a34c77e2ad3667551d6a133d8276224d027b6fe2
        Centro::class => CentroPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
