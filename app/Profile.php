<?php

namespace clinica;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	public function documentProfile(){
		return $this->hasOne('clinica\DocumentProfile');
	}
}
