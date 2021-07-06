<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'product_types';

    public function productsForType()
    {
        return $this->hasMany(Product::class, 'product_types_id');
    }
}