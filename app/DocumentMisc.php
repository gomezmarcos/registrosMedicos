<?php

namespace clinica;

use Illuminate\Database\Eloquent\Model;

class DocumentMisc extends Model
{
	public function Misc()	{
		return $this->belongsTo('clinica\Misc');
	}
}
