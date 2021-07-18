<?php

namespace App\Http\Requests;

use App\DTO\Product\ProductCreateDTO;
use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            self::FIELD_SKU => 'bail|required|string|min:6|max:30',
            self::FIELD_NAME => 'bail|required|string|min:2|max:100',
            self::FIELD_PRICE => 'bail|required|numeric',
            self::FIELD_PRODUCT_TYPE_ID => 'bail|required|numeric|integer'
        ];
    }

    /**
     * @return ProductCreateDTO
     */
    public function getDto(): ProductCreateDTO
    {
        return new ProductCreateDTO(
            $this->get(self::FIELD_SKU),
            $this->get(self::FIELD_NAME),
            $this->get(self::FIELD_PRICE),
            $this->get(self::FIELD_PRODUCT_TYPE_ID)
        );
    }
}
