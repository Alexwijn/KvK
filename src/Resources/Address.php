<?php
/**
 * @copyright Copyright (c) 2019, POS4RESTAURANTS BV. All rights reserved.
 * @internal  Unauthorized copying of this file, via any medium is strictly prohibited.
 */

namespace Alexwijn\KvK\Resources;

use Illuminate\Support\Arr;

/**
 * Alexwijn\KvK\Resources\Address
 */
class Address
{
    /**
     * @var array
     */
    protected $payload;

    /**
     * Address constructor.
     *
     * @param array $payload
     */
    public function __construct(array $payload)
    {
        $this->payload = $payload;
    }

    /**
     * Retrieves the street of this company
     *
     * @return string|null
     */
    public function street(): ?string
    {
        return Arr::get($this->payload, 'street');
    }

    /**
     * Retrieves the house number of this company
     *
     * @return string|null
     */
    public function houseNumber(): ?string
    {
        return Arr::get($this->payload, 'houseNumber');
    }

    /**
     * Retrieves the extra of this company
     *
     * @return string|null
     */
    public function extra(): ?string
    {
        return Arr::get($this->payload, 'houseNumberAddition');
    }

    /**
     * Retrieves the postal code of this company
     *
     * @return string|null
     */
    public function postalCode(): ?string
    {
        return Arr::get($this->payload, 'postalCode');
    }

    /**
     * Retrieves the city of this company
     *
     * @return string|null
     */
    public function city(): ?string
    {
        return Arr::get($this->payload, 'city');
    }

    /**
     * Retrieves the country of this company
     *
     * @return string|null
     */
    public function country(): ?string
    {
        return Arr::get($this->payload, 'country');
    }
}
