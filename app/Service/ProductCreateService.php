<?php

namespace App\Service;

use App\DTO\Request\Product\ProductCreateDTO;
use App\Exceptions\ValidationException;
use App\Models\Product;
use App\Models\ProductTypes;

/**
 * Класс отвечает за создание новых товаров
 *
 * Class ProductCreateService
 * @package App\Service
 */
class ProductCreateService
{
    /** @var Product $product */
    protected $product;

    /** @var ProductTypes $productTypes */
    protected $productTypes;

    public function __construct(Product $product, ProductTypes $productTypes)
    {
        $this->product = $product;
        $this->productTypes = $productTypes;
    }

    /**
     * @param ProductCreateDTO $productCreateDTO
     * @return int
     * @throws ValidationException
     * @throws \Exception
     */
    public function create(ProductCreateDTO $productCreateDTO): int
    {
        $name = $productCreateDTO->getName();
        $sku = $productCreateDTO->getSku();
        $price = $productCreateDTO->getPrice();
        $typeId = $productCreateDTO->getTypeId();

        if (!$this->productTypes->checkExistProductTypeById($typeId)) {
            throw new ValidationException('Указан неверный идентификатор типа товара');
        }

        if ($this->product->checkExistProductBySku($sku)) {
            throw new ValidationException('Товар с таким sku уже существует');
        }

        $this->product->name = $name;
        $this->product->sku = $sku;
        $this->product->price = $price;
        $this->product->type_id = $typeId;

        if (!$this->product->save()) {
            throw new \Exception('Не удалось создать новый товар');
        }

        return $this->product->id;
    }
}
