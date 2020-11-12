<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activation extends Model
{
    //
    protected $table="activations";

    public $fillable = ['username', 'password', 'package', 'm3u', 'active_code'];

    public function user () {
    	
    	return $this->belongTo(user::class);

    }
}
