<?php

namespace Alexwijn\KvK\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

/**
 * Alexwijn\KvK\Resources\Company
 */
class Company implements Arrayable
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
     * Retrieve the primary name of this company.
     *
     * @return array|null
     */
    public function name(): ?string
    {
        return Arr::get($this->payload, 'tradeNames.businessName');
    }

    /**
     * Retrieve the amount of companies at this company.
     *
     * @return array|null
     */
    public function employees(): ?int
    {
        return Arr::get($this->payload, 'employees');
    }

    /**
     * Retrieve all the names of this company.
     *
     * @return array|null
     */
    public function aliases(): ?array
    {
        return Arr::get($this->payload, 'tradeNames.currentTradeNames');
    }

    /**
     * Retrieve all the websites of this company.
     *
     * @return array|null
     */
    public function websites(): ?array
    {
        return Arr::get($this->payload, 'websites');
    }

    /**
     * Retrieve the address of this company.
     *
     * @return \Alexwijn\KvK\Resources\Address
     */
    public function address(): \Alexwijn\KvK\Resources\Address
    {
        return new Address(Arr::get($this->payload, 'addresses.0', []));
    }

    /**
     * Retrieve the foundation date of this company.
     *
     * @return \Illuminate\Support\Carbon|null
     */
    public function foundationDate(): ?Carbon
    {
        if ($date = Arr::get($this->payload, 'foundationDate')) {
            return Carbon::parse($date);
        }

        return null;
    }

    /**
     * Retrieve the registration date of this company.
     *
     * @return \Illuminate\Support\Carbon|null
     */
    public function registrationDate(): ?Carbon
    {
        if ($date = Arr::get($this->payload, 'registrationDate')) {
            return Carbon::parse($date);
        }

        return null;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return array_filter([
            'reference' => $this->reference(),
            'name' => $this->name(),
            'branchNumber' => $this->branchNumber(),
            'aliases' => $this->aliases(),
            'websites' => $this->websites(),
            'address' => optional($this->address())->toArray(),
            'foundationDate' => $this->foundationDate(),
            'registrationDate' => $this->registrationDate()
        ]);
    }
}
