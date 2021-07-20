<?php

namespace App\DTO\Request\Product;

class ProductUpdateDTO
{
    /** @var string|null */
    protected $sku;

    /** @var string|null */
    protected $name;

    /** @var float|null */
    protected $price;

    /** @var int|null */
    protected $typeId;

    public function __construct(?string $sku, ?string $name, ?float $price, ?int $typeId)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->typeId = $typeId;
    }

    /**
     * @return string|null
     */
    public function getSku(): ?string
    {
        return $this->sku;
    }

    /**
     * @param string|null $sku
     * @return ProductUpdateDTO
     */
    public function setSku(?string $sku): ProductUpdateDTO
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return ProductUpdateDTO
     */
    public function setName(?string $name): ProductUpdateDTO
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float|null $price
     * @return ProductUpdateDTO
     */
    public function setPrice(?float $price): ProductUpdateDTO
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTypeId(): ?int
    {
        return $this->typeId;
    }

    /**
     * @param int|null $typeId
     * @return ProductUpdateDTO
     */
    public function setTypeId(?int $typeId): ProductUpdateDTO
    {
        $this->typeId = $typeId;
        return $this;
    }
}
