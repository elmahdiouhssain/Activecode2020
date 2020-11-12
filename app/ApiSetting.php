<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApiSetting extends Model
{
    //
    protected $table="api_settings";
    public $timestamps = true;

    public $fillable = ['user_id', 'url', 'key'];

    public function user () {
    	
    	return $this->belongTo(user::class);

    }
}
