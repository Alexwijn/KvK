<?php
/**
 * @copyright Copyright (c) 2019, POS4RESTAURANTS BV. All rights reserved.
 * @internal  Unauthorized copying of this file, via any medium is strictly prohibited.
 */

namespace Alexwijn\KvK\Resources;

use Illuminate\Support\Arr;

/**
 * Alexwijn\KvK\Resources\Company
 */
class Company
{
    /** @var array */
    protected $payload;

    /**
     * Company constructor.
     *
     * @param array $payload
     */
    public function __construct(array $payload)
    {
        $this->payload = $payload;
    }

    /**
     * Check if a company is still active in the country.
     *
     * @return bool|null
     */
    public function active(): ?bool
    {
        return Arr::get($this->payload, 'actief');
    }

    /**
     * Retrieve the KvK reference of this company.
     *
     * @return string|null
     */
    public function reference(): ?string
    {
        return Arr::get($this->payload, 'kvkNumber');
    }

    /**
     * Retrieve the branch reference of this company.
     *
     * @return string|null
     */
    public function branchNumber(): ?string
    {
        return Arr::get($this->payload, 'branchNumber');
    }

    /**
     * Retrieve all the names of this company.
     *
     * @return array|null
     */
    public function names(): ?array
    {
        return Arr::get($this->payload, 'tradeNames');
    }

    /**
     * Retrieve the address of this company.
     *
     * @return \Alexwijn\KvK\Resources\Address
     */
    public function address(): \Alexwijn\KvK\Resources\Address
    {
        return new Address(Arr::get($this->payload, 'addresses.0'));
    }
}
