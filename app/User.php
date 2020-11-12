<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    public $timestamps = true;

    protected $fillable = [
        'fullname', 'email', 'password', 'inputstate', 'comment'
    ];

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
        'email_verified_at' => 'datetime',
    ];


    public function activations(){
        return $this->hasMany(activation::class);
    }

    public function comments(){
    return $this->hasMany(Comment::class);
    }

    public function tickets(){
    return $this->hasMany(Ticket::class);
    }

    public static function getTicketOwner($user_id){
        return static::where('id', $user_id)->firstOrFail();
    }

    public function apisettings(){
        return $this->hasMany(ApiSetting::class);
    }
    public function packages(){
        return $this->hasMany(packages::class);
    }






}
