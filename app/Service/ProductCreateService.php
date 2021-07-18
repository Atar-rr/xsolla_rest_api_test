<?php

namespace App\Service;

use App\DTO\Product\ProductCreateDTO;
use App\Models\Product;
use App\Models\ProductTypes;

class ProductCreateService
{
    /** @var Product $product */
    protected $product;

    /** @var Product $productTypes */
    protected $productTypes;

    public function __construct(Product $product, ProductTypes $productTypes)
    {
        $this->product = $product;
        $this->productTypes = $productTypes;
    }

    /**
     * @param ProductCreateDTO $productCreateDTO
     * @return int
     *
     * @throws \Exception
     */
    public function create(ProductCreateDTO $productCreateDTO): int
    {
        if (!$this->productTypes->where('id', $productCreateDTO->getTypeId())->exists()) {
            throw new \Exception('Указан неверный идентификатор типа товара');
        }

        if ($this->product->where('sku', $productCreateDTO->getSku())->exists()) {
            throw new \Exception('Товар с таким sku уже существует');
        }

        $this->product->name = $productCreateDTO->getName();
        $this->product->sku = $productCreateDTO->getSku();
        $this->product->price = $productCreateDTO->getPrice();
        $this->product->type_id = $productCreateDTO->getTypeId();

        if (!$this->product->save()) {
            throw new \Exception('Не удалось создать новый товар');
        }

        return $this->product->id;
    }
}
