<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartCategoryMigration extends Model
{
    use HasFactory;
    protected $fillable = ['cart_id', 'cart_categories_id'];
    protected $guarded = ['cart_id', 'cart_categories_id'];
    protected $table = 'cart_category_migration';

}
