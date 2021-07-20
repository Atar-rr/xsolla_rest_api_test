<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int id
 * @property int type_id
 * @property string sku
 * @property string name
 * @property float price
 */
class Product extends Model
{
    use HasFactory;

    public const
        ID = 'id',
        TYPE_ID = 'type_id',
        SKU = 'sku',
        NAME = 'name',
        PRICE = 'price';

    /**
     * @return BelongsTo
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(ProductTypes::class);
    }

    /**
     * Проверяем не занят ли sku
     *
     * @param string $sku
     * @return bool
     */
    public function checkExistProductBySku(string $sku): bool
    {
        return $this->where('sku', $sku)->exists();
    }
}
