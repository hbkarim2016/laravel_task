<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $fillable = [
      'comment_body', 'post_id',
  ];

  // foreign key to post by Post Id
  public function post(){
    return $this->belongsTo('App\models\Post','post_id');
  }
}
