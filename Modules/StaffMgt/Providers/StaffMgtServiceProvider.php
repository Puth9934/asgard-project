<?php

namespace Modules\StaffMgt\Providers;

use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\StaffMgt\Listeners\RegisterStaffMgtSidebar;

class StaffMgtServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterStaffMgtSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('staff', Arr::dot(trans('staffmgt::staff')));
            $event->load('departments',Arr::dot(trans('staffmgt::departments')));
            // append translations


        });


    }

    public function boot()
    {
        $this->publishConfig('staffmgt', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\StaffMgt\Repositories\StaffRepository',
            function () {
                $repository = new \Modules\StaffMgt\Repositories\Eloquent\EloquentStaffRepository(new \Modules\StaffMgt\Entities\Staff());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\StaffMgt\Repositories\Cache\CacheStaffDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Staffmgt\Repositories\departmentRepository',
            function () {
                $repository = new \Modules\Staffmgt\Repositories\Eloquent\EloquentdepartmentRepository(new \Modules\Staffmgt\Entities\department());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Staffmgt\Repositories\Cache\CachedepartmentDecorator($repository);
            }
        );
// add bindings


    }


}
