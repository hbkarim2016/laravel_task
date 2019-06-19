<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = [
      'title_body','post_body', 'user_id',
  ];
  
  public function comments() {
    $this->hasMany('App\models\Comment');
  }
}
