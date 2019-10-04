<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
//  protected $fillable = [
//   'content', 'author_id', 'post_id', 'created_at', 'updated_at', 'posted_at',
//  ];

protected $guarded = [];

 public function post()
 {
  return $this->belongsTo('App\Post');
 }
}
