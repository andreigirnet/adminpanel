<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartCategory extends Model
{
    use HasFactory;
    protected $fillable = ['category_name'];
    protected $guarded = ['id'];
    protected $table = 'cart_categories';

    public function category(){
       return $this->belongsTo(Cart::class,'carts','id','category_id');
    }
}
