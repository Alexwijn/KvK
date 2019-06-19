<?php

namespace Alexwijn\KvK\Concerns;

use Alexwijn\KvK\Connection;

/**
 * Alexwijn\KvK\Concerns\HasConnection
 */
trait HasConnection
{
    /** @var  \Alexwijn\KvK\Connection */
    protected $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }
}
