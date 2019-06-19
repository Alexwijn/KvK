<?php

namespace Alexwijn\KvK;

/**
 * Alexwijn\KvK\ServiceProvider
 */
class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/kvk.php', 'kvk');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config' => config_path(),
            ], 'config');
        }
    }

    public function register(): void
    {
        $this->app->singleton(Connection::class, static function () {
            return new class extends \GuzzleHttp\Client implements Connection
            {
                public function __construct()
                {
                    parent::__construct([
                        'headers' => [
                            'Content-Type' => 'application/json',
                            'auth' => [ config('kvk.username'),  config('kvk.password')],
                        ],
                        'base_uri' => 'https://api.kvk.nl/api/v2/' . (config('kvk.test_mode') ? 'test' : ''),
                    ]);
                }
            };
        });
    }
}
