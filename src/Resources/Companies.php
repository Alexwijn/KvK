<?php

namespace Alexwijn\KvK\Resources;

use Alexwijn\KvK\Collection;

/**
 * Alexwijn\KvK\Resources\Companies
 */
class Companies extends Collection
{
    public function __construct(array $companies = [])
    {
        foreach ($companies as $company) {
            $this->push($company);
        }
    }

    /** {@inheritDoc} */
    public function current(): ?Company
    {
        return current($this->items);
    }

    /** {@inheritDoc} */
    public function push(Company $companies): Companies
    {
        $this->items[] = $companies;

        return $this;
    }
}
