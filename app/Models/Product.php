<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id');
    }
}
