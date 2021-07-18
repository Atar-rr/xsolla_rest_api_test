<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
