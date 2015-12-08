<?php

namespace Gabe\Dayu\DayuServiceProviders;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class DayuServiceProvider extends ServiceProvider
{
    public function boot(PermissionRegistrar $permissionLoader)
    {
        if (!class_exists('CreateDaYusTable')) {
            $timestamp = date('Y_m_d_His', time());
            $this->publishes([
                __DIR__.'/../migrations/create_da_yus_table.php.stub' => $this->app->basePath().'/'.'database/migrations/'.$timestamp.'create_da_yus_table.php',
            ], 'migrations');
        }
    }

    public function register()
    {

    }


    protected function registerModelBindings()
    {

    }
}