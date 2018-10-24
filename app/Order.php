<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   
   public function user(){
    return $this->belongsTo("App\User");
   }
	
	public function education(){
		return $this->belongsTo("App\Educationlevel","educationlevel_id","id");
	}

	public function paper(){
		return $this->belongsTo('App\Papertype',"papertype_id","id");
	}    

	public function style(){
		return $this->belongsTo('App\Style',"style_id","id");
	}

	public function subject(){
		return $this->belongsTo('App\Subject',"subject_id","id");
	}

	public function orderFiles(){
		return $this->hasMany('App\Orderfile');
	}

	public function messages(){
		return $this->hasMany('App\message');
	}
}
