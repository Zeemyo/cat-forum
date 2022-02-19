<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class postingan extends Model
{
    protected $table = "postingan";
    protected $primaryKey = "id";
    protected $fillable = ['title', 'id_Category','id_user', 'id_comment', 'description', 'image'];

    public function Category()
    {
      return $this->belongsTo('App\Category', 'id_Category');
    }

    public function user()
    {
      return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function comments()
    {
      return $this->hasMany(Comment::class, 'id_postingan', 'id');
    }
}
