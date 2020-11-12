<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class packages extends Model
{
    //
    //
    protected $table="packages";

    public $fillable = ['name', 'xtreamui_id'];

    public function activations () {
    	
    	return $this->belongTo(activation::class);

    }
}
