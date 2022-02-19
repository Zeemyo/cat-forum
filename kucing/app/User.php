<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "users";
    protected $primaryKey = "id";
    protected $fillable = [
        'name', 'email', 'password', 'admin',
    ];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function forum(){
        return $this->hasMany(Forum::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'id_user', 'id');
    }

    public function postingans()
    {
/*       return $this->hasMany('App\postingan', 'id_Category'); */
      return $this->hasMany(postingan::class, 'id_user', 'id');
    }

    public function artikel()
    {
      return $this->hasMany('App\artikel', 'id_Category');
    }


}
