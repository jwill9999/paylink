<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

 /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
//  protected $fillable = [
 //   'title', 'content', 'author_id',
 //  ];

 /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
 protected $hidden = [
  'password', 'remember_token',
 ];

 /**
  * The attributes that should be cast to native types.
  *
  * @var array
  */
 protected $casts = [

 ];

 protected $guarded = [];

 public function comments()
 {
  return $this->hasMany('App\Reply');
 }

 public function user()
 {
  return $this->belongsTo('App\User');
 }

}
