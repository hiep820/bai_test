<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';
    public $timestamps=false;
    public $primaryKey= 'id_post';
    public function getStateNameAttribute()
    {
        if ($this->state == 1) {
            return "chưa duyệt";
        } else {
            return "đã duyệt";
        }
    }
}
