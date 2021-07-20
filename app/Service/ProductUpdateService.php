<?php

namespace App\Service;

use App\DTO\Request\Product\ProductUpdateDTO;
use App\Exceptions\ValidationException;
use App\Models\Product;
use App\Models\ProductTypes;

class ProductUpdateService
{
    /** @var ProductTypes $productTypes */
    protected $productTypes;

    public function __construct(ProductTypes $productTypes)
    {
        $this->productTypes = $productTypes;
    }

    /**
     * @param ProductUpdateDTO $productUpdateDTO
     * @param Product $product
     * @return int
     * @throws ValidationException
     * @throws \Exception
     */
    public function update(ProductUpdateDTO $productUpdateDTO, Product $product): int
    {
        $name = $productUpdateDTO->getName();
        $sku = $productUpdateDTO->getSku();
        $price = $productUpdateDTO->getPrice();
        $typeId = $productUpdateDTO->getTypeId();

        if ($sku !== null) {
            if ($product->checkExistProductBySku($sku)) {
                throw new ValidationException('Товар с таким sku уже существует');
            }
            $product->sku = $sku;
        }

        if ($typeId !== null) {
            if (!$this->productTypes->checkExistProductTypeById($typeId)) {
                throw new ValidationException('Указан неверный идентификатор типа товара');
            }
            $product->type_id = $typeId;
        }

        if ($name !== null) {
            $product->name = $name;
        }

        if ($price !== null) {
            $product->price = $price;
        }

        if (!$product->save()) {
            throw new \Exception('Не удалось создать новый товар');
        }

        return $product->id;
    }
}
