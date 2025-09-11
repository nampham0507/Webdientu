<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    protected $primaryKey = 'CartID';
    public $timestamps = false;

    protected $fillable = [
        'UserID',
        'CreatedAt',
        'Completed',
        'UpdatedAt'
    ];
}
