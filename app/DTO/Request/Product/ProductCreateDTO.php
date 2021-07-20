<?php

namespace App\DTO\Request\Product;

class ProductCreateDTO
{
    /** @var string */
    protected $sku;

    /** @var string */
    protected $name;

    /** @var float */
    protected $price;

    /** @var int */
    protected $typeId;

    public function __construct(string $sku, string $name, float $price, int $typeId)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->typeId = $typeId;
    }

    /**
     * @return string
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     * @return ProductCreateDTO
     */
    public function setSku(string $sku): ProductCreateDTO
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ProductCreateDTO
     */
    public function setName(string $name): ProductCreateDTO
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return ProductCreateDTO
     */
    public function setPrice(float $price): ProductCreateDTO
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return int
     */
    public function getTypeId(): int
    {
        return $this->typeId;
    }

    /**
     * @param int $typeId
     * @return ProductCreateDTO
     */
    public function setTypeId(int $typeId): ProductCreateDTO
    {
        $this->typeId = $typeId;
        return $this;
    }
}
