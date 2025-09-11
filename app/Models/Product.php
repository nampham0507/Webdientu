<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'ProductID';   // rất quan trọng
    public $timestamps = true;

    protected $fillable = [
        'ProductName',
        'Price',
        'OriginalPrice',
        'Description',
        'Image'
    ];
}
