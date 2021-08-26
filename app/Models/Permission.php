<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = ['permission_name'];
    protected $guarded = ['id'];
    protected $table = 'permission';

    public function role(){
        return $this->belongsToMany(Role::class,'role_permission','permission_id','id');
    }
}
