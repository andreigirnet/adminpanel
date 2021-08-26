<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable  = ['role_name'];
    protected $guarded = ['id'];
    protected $table = 'role';

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function permission(){
       return $this->belongsToMany(Permission::class,'role_permission','role_id','id');
    }
}
