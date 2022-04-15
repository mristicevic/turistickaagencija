<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $table = "trips";
    public function category(){
        return $this->belongsTo(Catagory::class,'category_id');
    }
}
