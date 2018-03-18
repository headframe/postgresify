<?php

namespace Headframe\Postgresify\Tests;

use Mockery;
use Illuminate\Database\Connection;
use Illuminate\Database\Schema\Builder;
use Illuminate\Database\Schema\Blueprint;
use Headframe\Postgresify\PostgresifyGrammar;

/**
 * Class SchemaBuilderTest
 *
 * @package Headframe\Postgresify\Tests
 */
class SchemaBuilderTest extends AbstractTestCase
{
    public function builderMethodsWithExpectedSql()
    {
        return [
            ['money', 'create table "sample" ("column_name" money not null)'],
            ['netmask', 'create table "sample" ("column_name" cidr not null)'],
            ['integerRange', 'create table "sample" ("column_name" int4range not null)'],
            ['bigIntegerRange', 'create table "sample" ("column_name" int8range not null)'],
            ['numericRange', 'create table "sample" ("column_name" numrange not null)'],
            ['timestampRange', 'create table "sample" ("column_name" tsrange not null)'],
            ['timestampTimezoneRange', 'create table "sample" ("column_name" tstzrange not null)'],
            ['dateRange', 'create table "sample" ("column_name" daterange not null)'],
        ];
    }

    /**
     * @dataProvider builderMethodsWithExpectedSql
     */
    public function testTypesProduceIntendedStatements($method, $sql)
    {
        /** @var Connection $connection */
        $connection = Mockery::mock(Connection::class)
            ->makePartial()
            ->shouldReceive('statement')
            ->with($sql)
            ->once()
            ->getMock();

        $connection->setSchemaGrammar(new PostgresifyGrammar());

        $schemaBuilder = new Builder($connection);

        $schemaBuilder->create('sample', function (Blueprint $table) use ($method) {
            $table->{$method}('column_name');
        });

        // Thank you PHPUnit 6.x.
        $this->addToAssertionCount(Mockery::getContainer()->mockery_getExpectationCount());

        Mockery::close();
    }
}
