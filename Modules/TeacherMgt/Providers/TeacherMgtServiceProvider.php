<?php

namespace Modules\TeacherMgt\Providers;

use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\TeacherMgt\Listeners\RegisterTeacherMgtSidebar;

class TeacherMgtServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterTeacherMgtSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('teachers', Arr::dot(trans('teachermgt::teachers')));
            $event->load('genders', Arr::dot(trans('teachermgt::genders')));
            $event->load('gender_ids', Arr::dot(trans('teachermgt::gender_ids')));
            $event->load('subjects', Arr::dot(trans('teachermgt::subjects')));
            $event->load('departments', Arr::dot(trans('teachermgt::departments')));
            // append translations








        });


    }

    public function boot()
    {
        $this->publishConfig('teachermgt', 'permissions');

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
            'Modules\TeacherMgt\Repositories\TeacherRepository',
            function () {
                $repository = new \Modules\TeacherMgt\Repositories\Eloquent\EloquentTeacherRepository(new \Modules\TeacherMgt\Entities\Teacher());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\TeacherMgt\Repositories\Cache\CacheTeacherDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Teachermgt\Repositories\GenderRepository',
            function () {
                $repository = new \Modules\Teachermgt\Repositories\Eloquent\EloquentGenderRepository(new \Modules\Teachermgt\Entities\Gender());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Teachermgt\Repositories\Cache\CacheGenderDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Teachermgt\Repositories\Gender_idRepository',
            function () {
                $repository = new \Modules\Teachermgt\Repositories\Eloquent\EloquentGender_idRepository(new \Modules\Teachermgt\Entities\Gender_id());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Teachermgt\Repositories\Cache\CacheGender_idDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Teachermgt\Repositories\subjectsRepository',
            function () {
                $repository = new \Modules\Teachermgt\Repositories\Eloquent\EloquentsubjectsRepository(new \Modules\Teachermgt\Entities\subjects());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Teachermgt\Repositories\Cache\CachesubjectsDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Teachermgt\Repositories\dapartmentRepository',
            function () {
                $repository = new \Modules\Teachermgt\Repositories\Eloquent\EloquentdapartmentRepository(new \Modules\Teachermgt\Entities\dapartment());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Teachermgt\Repositories\Cache\CachedapartmentDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Teachermgt\Repositories\departmentRepository',
            function () {
                $repository = new \Modules\Teachermgt\Repositories\Eloquent\EloquentdepartmentRepository(new \Modules\Teachermgt\Entities\department());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Teachermgt\Repositories\Cache\CachedepartmentDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Teachermgt\Repositories\departmentRepository',
            function () {
                $repository = new \Modules\Teachermgt\Repositories\Eloquent\EloquentdepartmentRepository(new \Modules\Teachermgt\Entities\department());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Teachermgt\Repositories\Cache\CachedepartmentDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Teachermgt\Repositories\departmentRepository',
            function () {
                $repository = new \Modules\Teachermgt\Repositories\Eloquent\EloquentdepartmentRepository(new \Modules\Teachermgt\Entities\department());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Teachermgt\Repositories\Cache\CachedepartmentDecorator($repository);
            }
        );
// add bindings








    }


}
