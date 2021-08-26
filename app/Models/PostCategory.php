<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;
    protected $fillable = ['post_id', 'category_id'];
    protected $guarded = ['post_id','category_id'];
    protected $table = "post_category";
}
