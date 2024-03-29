<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Area;
use App\Models\Category;
use App\Models\Option;
use App\Models\Quarter;
use App\Models\Property;
use App\Policies\AreaPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\OptionPolicy;
use App\Policies\QuaterPolicy;
use App\Policies\PropertyPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Property::class => PropertyPolicy::class,
        Option::class => OptionPolicy::class,
        Area::class => AreaPolicy::class,
        Quarter::class => QuaterPolicy::class,
        Category::class => CategoryPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //
    }
}
