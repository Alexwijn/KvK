<?php

namespace Alexwijn\KvK\Resources;

use Alexwijn\KvK\Collection;

/**
 * Alexwijn\KvK\Resources\Companies
 */
class Companies extends Collection
{
    /**
     * @var int
     */
    protected $pageSize;

    /**
     * @var int
     */
    protected $page;

    /**
     * @var int
     */
    protected $total;

    public function __construct(int $page, int $total, int $pageSize)
    {
        $this->page = $page;
        $this->total = $total;
        $this->pageSize = $pageSize;
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
