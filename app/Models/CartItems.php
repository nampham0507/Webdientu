<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItems extends Model
{
    protected $table = 'cartitems';
    protected $primaryKey = 'CartItemID';
    public $timestamps = false;

    protected $fillable = [
        'CartID',
        'ProductID',
        'Quantity'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductID', 'ProductID'); //Eloquent Relationship
    }
}
