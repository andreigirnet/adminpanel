<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role_permission extends Model
{
    use HasFactory;
    protected $fillable  = ['role_id','permission_id'];
    protected $guarded = ['role_id','permission_id'];
    protected $table = 'role_permission';
}
