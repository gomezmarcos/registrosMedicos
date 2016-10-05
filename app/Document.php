<?php

namespace clinica;

use Illuminate\Database\Eloquent\Model;

class Document extends Model {
	public function test()	{
		return $this->belongsTo('clinica\Test');
	}
}
