<?php

namespace Headframe\Postgresify;

use Illuminate\Database\Connection;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\PostgresConnection;

/**
 * Class PostgresifyServiceProvider
 *
 * @package Headframe\Postgresify
 */
class PostgresifyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blueprint::mixin(new PostgresifyBlueprintMixin());
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        Connection::resolverFor('pgsql', function ($connection, $database, $prefix, $config) {
            return tap(new PostgresConnection(
                $connection,
                $database,
                $prefix,
                $config
            ), function (PostgresConnection $connection) {
                $connection->setSchemaGrammar(
                    $connection->withTablePrefix(new PostgresifyGrammar())
                );
            });
        });
    }
}
