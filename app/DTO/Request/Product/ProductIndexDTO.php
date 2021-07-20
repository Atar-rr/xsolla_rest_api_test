<?php

namespace App\DTO\Request\Product;

class ProductIndexDTO
{
    /** @var int */
    protected $limit = 10;

    /** @var int */
    protected $offset = 0;

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     * @return ProductIndexDTO
     */
    public function setLimit(int $limit): ProductIndexDTO
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * @param int $offset
     * @return ProductIndexDTO
     */
    public function setOffset(int $offset): ProductIndexDTO
    {
        $this->offset = $offset;
        return $this;
    }
}
