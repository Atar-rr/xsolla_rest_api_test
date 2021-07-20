<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string name
 */
class ProductTypes extends Model
{
    use HasFactory;

    public const
        ID = 'id',
        NAME = 'name';

    public function checkExistProductTypeById(int $id): bool
    {
        return $this->where('id', $id)->exists();
    }
}
