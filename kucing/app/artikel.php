<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class artikel extends Model
{
  protected $table = "artikel";

  protected $fillable = ['title', 'id_Category', 'description', 'image'];

  public function Category()
  {
    return $this->belongsTo('App\Category', 'id_Category');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function comments()
  {
    return $this->morphMany('App\Comment', 'commentable');
  }
}
