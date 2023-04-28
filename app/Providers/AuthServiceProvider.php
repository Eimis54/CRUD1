<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Car;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        App\Models\Owner::class=>App\Models\OwnerPolicy::class,
        App\Model\Car::class=>App\Models\CarPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
// admin = 0 ALL, reader = 1 read all edit only his, basic = 2 read and edit only his
