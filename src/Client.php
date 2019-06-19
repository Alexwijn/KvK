<?php

namespace Alexwijn\KvK;

use Alexwijn\KvK\Concerns\HasConnection;

/**
 * Alexwijn\KvK\Client
 */
class Client
{
    use HasConnection;

    /** @var  array */
    protected $config;

    public function companies(): PassThrough\Companies
    {
        return new PassThrough\Companies($this->connection);
    }
}
