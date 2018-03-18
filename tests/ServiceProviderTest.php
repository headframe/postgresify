<?php

namespace Headframe\Postgresify\Tests;

use PDO;
use Mockery;
use Illuminate\Database\Connection;
use Illuminate\Database\PostgresConnection;
use Headframe\Postgresify\PostgresifyGrammar;
use GrahamCampbell\TestBenchCore\ServiceProviderTrait;

class ServiceProviderTest extends AbstractTestCase
{
    use ServiceProviderTrait;

    public function testServiceProviderRegistersPostgresConnectionResolverWithPostgresifyGrammar()
    {
        $providerClass = $this->getServiceProviderClass($this->app);
        tap(new $providerClass($this->app))->register();

        $resolver = Connection::getResolver('pgsql');
        $connection = $resolver(Mockery::mock(PDO::class), 'sampledb', '', []);

        $this->assertEquals(PostgresConnection::class, get_class($connection));
        $this->assertEquals(PostgresifyGrammar::class, get_class($connection->getSchemaGrammar()));
    }
}
