<?php

namespace Gabe\Dayu;

use Illuminate\Support\ServiceProvider;

class DayuServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if (!class_exists('CreateDaYusTable')) {
            $timestamp = date('Y_m_d_His', time());
            $this->publishes([
                __DIR__.'/../migrations/create_da_yus_table.php.stub' => $this->app->basePath().'/'.'database/migrations/'.$timestamp.'_create_da_yus_table.php',
            ], 'migrations');
        }

        if (!class_exists('AddSendedAtToGabeDayu')) {
            $timestamp = date('Y_m_d_His', time());
            $this->publishes([
                __DIR__.'/../migrations/add_sended_at_to_gabe_dayu.php.stub' => $this->app->basePath().'/'.'database/migrations/'.$timestamp.'_create_da_yus_table.php',
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