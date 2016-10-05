<?php

namespace clinica;

use Illuminate\Database\Eloquent\Model;

class Misc extends Model
{
	public function documentMisc()	{
		return $this->hasOne('clinica\DocumentMisc');
	}
}
