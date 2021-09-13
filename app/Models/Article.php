<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Article extends Authenticatable
{
    use HasFactory;
    protected $table = 'articles';
    protected $fillable = ['user_id', 'text'];
    public function user()
    {
      return $this->belongsTo('User' , 'user_id');
    }
}
