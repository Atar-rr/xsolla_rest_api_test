<?php

namespace App\Http\Requests;

use App\DTO\Request\Product\ProductIndexDTO;
use Illuminate\Foundation\Http\FormRequest;

class ProductIndexRequest extends FormRequest
{
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
            'limit' => 'integer',
            'offset' => 'integer'
        ];
    }

    /**
     * @return ProductIndexDTO
     */
    public function getDto(): ProductIndexDTO
    {
        return (new ProductIndexDTO())
            ->setOffset($this->get('offset'))
            ->setLimit($this->get('limit'));
    }
}
