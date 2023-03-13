<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = "users";
    public $primaryKey= 'id';
    public function user(){
    	return $this->hasMany('App\models\Post', 'users_id', 'id');
    }
}
