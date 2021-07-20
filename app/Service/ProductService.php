<?php

namespace App\Service;

use App\DTO\Request\Product\ProductIndexDTO;
use App\Models\Product;

/**
 * Класс отвечает за отображение списка товаров
 *
 * Class ProductService
 * @package App\Service
 */
class ProductService
{
    /** @var Product $product */
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * @param ProductIndexDTO $productIndexDTO
     * @return array
     */
    public function getList(ProductIndexDTO $productIndexDTO): array
    {
        $products = [];
        $total = Product::count();

        $limit = $productIndexDTO->getLimit();
        if ($limit === 0) {
            return [$products, $total];
        }

        $products =
            Product::offset($productIndexDTO->getOffset())
                ->limit($limit)
                ->get();

        return [$products, $total];
    }
}
