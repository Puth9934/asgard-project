<?php

namespace Modules\Student\Providers;

use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Student\Listeners\RegisterStudentSidebar;

class StudentServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterStudentSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('students', Arr::dot(trans('student::students')));
            $event->load('departments', Arr::dot(trans('student::departments')));
            $event->load('groups', Arr::dot(trans('student::groups')));
            // append translations



        });


    }

    public function boot()
    {
        $this->publishConfig('student', 'permissions');

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
            'Modules\Student\Repositories\StudentRepository',
            function () {
                $repository = new \Modules\Student\Repositories\Eloquent\EloquentStudentRepository(new \Modules\Student\Entities\Student());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Student\Repositories\Cache\CacheStudentDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Student\Repositories\DepartmentRepository',
            function () {
                $repository = new \Modules\Student\Repositories\Eloquent\EloquentDepartmentRepository(new \Modules\Student\Entities\Department());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Student\Repositories\Cache\CacheDepartmentDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Student\Repositories\GroupRepository',
            function () {
                $repository = new \Modules\Student\Repositories\Eloquent\EloquentGroupRepository(new \Modules\Student\Entities\Group());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Student\Repositories\Cache\CacheGroupDecorator($repository);
            }
        );
// add bindings



    }


}
