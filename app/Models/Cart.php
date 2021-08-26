<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['item_name', 'quantity','category_id','picture'];

    protected $guarded = ['id'];
    protected $table = 'carts';

    public function cartcategory(){
        return $this->hasOne(CartCategory::class,'id','category_id');
    }
}
