<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'ProductID';
    public $timestamps = true;

    protected $fillable = [
        'ProductName',
        'Price',
        'OriginalPrice',
        'Description',
        'Image',
        'ImageURL',
        'Category',
        'Brand',
        'Stock',
        'Discount',
        'IsFeatured'
    ];

    protected $casts = [
        'IsFeatured' => 'boolean',
        'Price' => 'decimal:2',
        'OriginalPrice' => 'decimal:2'
    ];
}
