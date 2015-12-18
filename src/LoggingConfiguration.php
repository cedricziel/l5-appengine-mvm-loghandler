<?php

namespace CedricZiel\AppEngineMvmLoghandler;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Bootstrap\ConfigureLogging;
use Illuminate\Log\Writer;

/**
 * Class LoggingConfiguration
 * Configures logging to a location AppEngine knows and collects
 *
 * @package CedricZiel\AppEngineMvmLoghandler
 */
class LoggingConfiguration extends ConfigureLogging {

    /**
     * Custom Monolog handler that for AppEngine ManagedVMs.
     *
     * @param  \Illuminate\Contracts\Foundation\Application $app
     * @param  \Illuminate\Log\Writer $log
     *
     * @return void
     */
    protected function configureAppenginemvmHandler(Application $app, Writer $log)
    {
        // Log to designated
        $log->useFiles($app->storagePath() . '/logs/laravel.log');
        $log->useFiles('/var/log/app_engine/custom_logs/laravel.log');
    }
}
