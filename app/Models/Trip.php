<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'description',
        'image',
        'time',
        'quantity',
        'price',
        'discount_price',
        'category_id'
    ];

   
    



    protected $table = "trips";
    public function category(){
        return $this->belongsTo(Catagory::class,'category_id');
    }
}
