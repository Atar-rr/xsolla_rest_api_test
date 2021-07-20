<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    public const
        FIELD_TOTAL = 'total',
        FIELD_META = 'meta';

    protected $total;

    public function __construct($resource, int $total)
    {
        parent::__construct($resource);
        $this->total = $total;
    }

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return parent::toArray($request);
    }

    /**
     * Получить дополнительные данные, возвращаемые с массивом ресурса.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function with($request): array
    {
        return [
            self::FIELD_META => [
                self::FIELD_TOTAL => $this->total,
            ],
        ];
    }
}
