<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public const
        FIELD_ID = 'id',
        FIELD_TYPE = 'type',
        FIELD_SKU = 'sku',
        FIELD_NAME = 'name',
        FIELD_PRICE = 'price';

    /**
     * The "data" wrapper that should be applied.
     *
     * @var string
     */
    public static $wrap = 'product';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            self::FIELD_ID => $this->id,
            self::FIELD_SKU => $this->sku,
            self::FIELD_PRICE => $this->price,
            self::FIELD_TYPE => new ProductTypesResource($this->type),
        ];
    }
}
