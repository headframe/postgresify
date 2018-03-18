<?php

namespace Headframe\Postgresify;

use Closure;

/**
 * Class PostgresifyBlueprintMixin
 *
 * @package Headframe\Postgresify
 */
class PostgresifyBlueprintMixin
{
    /**
     * Create a new money column on the table.
     *
     * @return Closure
     */
    public function money()
    {
        return function (string $column) {
            return static::addColumn('money', $column);
        };
    }

    /**
     * Create a new netmask column on the table.
     *
     * @return Closure
     */
    public function netmask()
    {
        return function (string $column) {
            return static::addColumn('netmask', $column);
        };
    }

    /**
     * Create a new integerRange column on the table.
     *
     * @return Closure
     */
    public function integerRange()
    {
        return function (string $column) {
            return static::addColumn('integerRange', $column);
        };
    }

    /**
     * Create a new bigIntegerRange column on the table.
     *
     * @return Closure
     */
    public function bigIntegerRange()
    {
        return function (string $column) {
            return static::addColumn('bigIntegerRange', $column);
        };
    }

    /**
     * Create a new numericRange column on the table.
     *
     * @return Closure
     */
    public function numericRange()
    {
        return function (string $column) {
            return static::addColumn('numericRange', $column);
        };
    }

    /**
     * Create a new timestampRange column on the table.
     *
     * @return Closure
     */
    public function timestampRange()
    {
        return function (string $column) {
            return static::addColumn('timestampRange', $column);
        };
    }

    /**
     * Create a new timestampTimezoneRange column on the table.
     *
     * @return Closure
     */
    public function timestampTimezoneRange()
    {
        return function (string $column) {
            return static::addColumn('timestampTimezoneRange', $column);
        };
    }

    /**
     * Create a new dateRange column on the table.
     *
     * @return Closure
     */
    public function dateRange()
    {
        return function (string $column) {
            return static::addColumn('dateRange', $column);
        };
    }
}
