<?php

namespace App\Providers;

<<<<<<< HEAD
=======

>>>>>>> 01d37c149f62a85010753c1fa04b28a44c7b00df
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\CentroPolicy;
use App\Models\Centro;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
<<<<<<< HEAD
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
=======

>>>>>>> 01d37c149f62a85010753c1fa04b28a44c7b00df
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
