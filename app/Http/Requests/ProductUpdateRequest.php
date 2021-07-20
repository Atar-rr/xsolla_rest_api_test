<?php

namespace App\Http\Requests;

use App\DTO\Request\Product\ProductUpdateDTO;
use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    protected const
        FIELD_SKU = 'sku',
        FIELD_NAME = 'name',
        FIELD_PRICE = 'price',
        FIELD_PRODUCT_TYPE_ID = 'product_type_id';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            self::FIELD_SKU => 'bail|string|min:6|max:30',
            self::FIELD_NAME => 'bail|string|min:2|max:100',
            self::FIELD_PRICE => 'bail|numeric',
            self::FIELD_PRODUCT_TYPE_ID => 'bail|numeric|integer'
        ];
    }

    /**
     * @return ProductUpdateDTO
     */
    public function getDto(): ProductUpdateDTO
    {
        return new ProductUpdateDTO(
            $this->get(self::FIELD_SKU),
            $this->get(self::FIELD_NAME),
            $this->get(self::FIELD_PRICE),
            $this->get(self::FIELD_PRODUCT_TYPE_ID)
        );
    }
}
