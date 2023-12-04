<?php

namespace ExtraToolkits\Console;

use Illuminate\Support\ServiceProvider;

class CommandServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerCommands();
    }

    /**
     * Register the package's commands.
     *
     * @return void
     */
    protected function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\BaseRepositoryCommand::class,
                Commands\BaseServiceCommand::class,
                Commands\InstallCommand::class,
                Commands\RepositoryCommand::class,
                Commands\ServiceCommand::class,
            ]);
        }
    }
}
