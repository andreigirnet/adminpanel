<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title'];
    protected $guarded = 'id';
    protected $table = 'categories';


    use HasFactory;

    public function posts(){
        return $this->belongsToMany(Posts::class,'post_category', 'category_id', 'post_id');
    }
}
