<?php

namespace Headframe\Postgresify\Tests;

use Illuminate\Contracts\Foundation\Application;
use GrahamCampbell\TestBench\AbstractPackageTestCase;
use Headframe\Postgresify\PostgresifyServiceProvider;

/**
 * Class AbstractTestCase
 *
 * @package Headframe\Postgresify\Tests
 */
abstract class AbstractTestCase extends AbstractPackageTestCase
{
    /**
     * Get the service provider class.
     *
     * @param Application $app
     *
     * @return string
     */
    protected function getServiceProviderClass($app)
    {
        return PostgresifyServiceProvider::class;
    }
}
