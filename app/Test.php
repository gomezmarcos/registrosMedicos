<?php

namespace clinica;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
	public function documents()	{
		return $this->hasMany('clinica\Document');
	}
}
