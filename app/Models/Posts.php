<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'excerpt', 'content','user_id','slug'];
    protected $guarded = ['id'];
    protected $table = "posts";
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function categories(){
        return $this->belongstoMany(Category::class,'post_category', 'post_id', 'category_id');
    }
}
