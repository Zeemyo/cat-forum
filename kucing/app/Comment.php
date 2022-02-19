<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $table = "comments";
  protected $primaryKey = "id";
  protected $fillable = ['name', 'comment', 'id_user','id_postingan'];



/*   public function replies()
  {
    return $this->hasMany('App\Reply');
  } */

  // public function commentable()
  // {
  //   return $this->morphTo();
  // }
  //
  public function user()
  {
    return $this->belongsTo(User::class, 'id_user', 'id');
  }

  public function postingan()
  {
    return $this->hasOne(postingan::class, 'id_postingan', 'id');
  
  }
  
  // public function comments()
  // {
  //   return $this->morphMany('App\comment', 'commentable');
  // }
}
