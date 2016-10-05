<?php

namespace clinica;

use Illuminate\Database\Eloquent\Model;

class OtroStudy extends Model
{
	public function documents(){
		return $this->hasMany('clinica\DocumentStudy');
	}
}
