<?php

namespace Modules\UniStudentManagement\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Modules\UniStudentManagement\Livewire\QuickSearchStudent;
use Modules\UniStudentManagement\Livewire\Student\StudentDetails;
use Modules\UniStudentManagement\Livewire\StudentCreate;
use Modules\UniStudentManagement\Livewire\StudentSelect;
use Modules\UniStudentManagement\Livewire\StudentTable;
use Modules\UniStudentManagement\Livewire\StudentUpdate;
use Modules\UniStudentManagement\Livewire\UniRegisterCreate;
use Modules\UniStudentManagement\Livewire\UniRegisterUpdate;
use Modules\UniStudentManagement\Livewire\University\UniRegisterCreateV1;
use Nwidart\Modules\Traits\PathNamespace;

class UniStudentManagementServiceProvider extends ServiceProvider
{
    use PathNamespace;

    protected string $name = 'UniStudentManagement';

    protected string $nameLower = 'unistudentmanagement';

    /**
     * Boot the application events.
     */
    public function boot(): void
    {
        $this->registerCommands();
        $this->registerCommandSchedules();
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->name, 'database/migrations'));
        $this->loadTranslationsFrom(__DIR__.'/../Resources/lang', 'unistudentmanagement');



        Livewire::component('unistudentmanagement::student-table',StudentTable::class);
        Livewire::component('unistudentmanagement::student-create',StudentCreate::class);
        Livewire::component('unistudentmanagement::student-update',StudentUpdate::class);
        Livewire::component('unistudentmanagement::student-details',StudentDetails::class);
        Livewire::component('unistudentmanagement::uni-register-create-v1',UniRegisterCreateV1::class);

        Livewire::component('unistudentmanagement::quick-serarch-student',QuickSearchStudent::class);
        Livewire::component('unistudentmanagement::student-select',StudentSelect::class);

        Livewire::component('unistudentmanagement::uni-register-create',UniRegisterCreate::class);
        Livewire::component('unistudentmanagement::uni-register-update',UniRegisterUpdate::class);

        Livewire::component('unistudentmanagement::usm-settings',\Modules\UniStudentManagement\Livewire\UsmSettings::class);
    }

    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $this->app->register(EventServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register commands in the format of Command::class
     */
    protected function registerCommands(): void
    {
        // $this->commands([]);
    }

    /**
     * Register command Schedules.
     */
    protected function registerCommandSchedules(): void
    {
        // $this->app->booted(function () {
        //     $schedule = $this->app->make(Schedule::class);
        //     $schedule->command('inspire')->hourly();
        // });
    }

    /**
     * Register translations.
     */
    public function registerTranslations(): void
    {
        $langPath = resource_path('lang/modules/'.$this->nameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->nameLower);
            $this->loadJsonTranslationsFrom($langPath);
        } else {
            $this->loadTranslationsFrom(module_path($this->name, 'lang'), $this->nameLower);
            $this->loadJsonTranslationsFrom(module_path($this->name, 'lang'));
        }
    }

    /**
     * Register config.
     */
    protected function registerConfig(): void
    {
        $this->publishes([module_path($this->name, 'config/config.php') => config_path($this->nameLower.'.php')], 'config');
        $this->mergeConfigFrom(module_path($this->name, 'config/config.php'), $this->nameLower);
    }

    /**
     * Register views.
     */
    public function registerViews(): void
    {
        $viewPath = resource_path('views/modules/'.$this->nameLower);
        $sourcePath = module_path($this->name, 'resources/views');

        $this->publishes([$sourcePath => $viewPath], ['views', $this->nameLower.'-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->nameLower);

        $componentNamespace = $this->module_namespace($this->name, $this->app_path(config('modules.paths.generator.component-class.path')));
        Blade::componentNamespace($componentNamespace, $this->nameLower);
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (config('view.paths') as $path) {
            if (is_dir($path.'/modules/'.$this->nameLower)) {
                $paths[] = $path.'/modules/'.$this->nameLower;
            }
        }

        return $paths;
    }
}
