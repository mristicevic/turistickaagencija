<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Trip;

class ShopCart extends Model
{
    use HasFactory;
    public $table = 'shop_carts';

    protected $fillable = [
        'trip_id',
        'quantity',
        'price',
        'user_id',
        'created_at',
        'updated_at',
    ];

    public function trip()
    {
        return $this-> hasMany(Trip::class, 'id', 'trip_id');
    }
}
