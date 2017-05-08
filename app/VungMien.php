<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VungMien extends Model
{
    protected $table = "vungmien";

    public function monan(){
    	return $this->hasMany('App\MonAn','id_VungMien');
    }
}
