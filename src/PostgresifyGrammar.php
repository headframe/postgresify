<?php

namespace Headframe\Postgresify;

use Illuminate\Support\Fluent;
use Illuminate\Database\Schema\Grammars\PostgresGrammar;

/**
 * Class PostgresifyGrammar
 *
 * @package Headframe\Postgresify
 */
class PostgresifyGrammar extends PostgresGrammar
{
    /**
     * Create the column definition for a money type.
     *
     * @param Fluent $column
     *
     * @return string
     */
    protected function typeMoney(Fluent $column)
    {
        return 'money';
    }

    /**
     * Create the column definition for a CIDR notation-style netmask.
     *
     * @param Fluent $column
     *
     * @return string
     */
    protected function typeNetmask(Fluent $column)
    {
        return 'cidr';
    }

    /**
     * Create the column definition for storing a 32-bit integer range type.
     *
     * @param Fluent $column
     *
     * @return string
     */
    protected function typeIntegerRange(Fluent $column)
    {
        return 'int4range';
    }

    /**
     * Create the column definition for storing a 64-bit integer range type.
     *
     * @param Fluent $column
     *
     * @return string
     */
    protected function typeBigIntegerRange(Fluent $column)
    {
        return 'int8range';
    }

    /**
     * Create the column definition for storing a numeric range type.
     *
     * @param Fluent $column
     *
     * @return string
     */
    protected function typeNumericRange(Fluent $column)
    {
        return 'numrange';
    }

    /**
     * Create the column definition for storing a timestamp range type.
     *
     * @param Fluent $column
     *
     * @return string
     */
    protected function typeTimestampRange(Fluent $column)
    {
        return 'tsrange';
    }

    /**
     * Create the column definition for storing a timestamp with timezones range type.
     *
     * @param Fluent $column
     *
     * @return string
     */
    protected function typeTimestampTimezoneRange(Fluent $column)
    {
        return 'tstzrange';
    }

    /**
     * Create the column definition for storing a date range type.
     *
     * @param Fluent $column
     *
     * @return string
     */
    protected function typeDateRange(Fluent $column)
    {
        return 'daterange';
    }
}
