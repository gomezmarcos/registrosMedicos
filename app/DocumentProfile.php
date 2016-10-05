<?php

namespace clinica;

use Illuminate\Database\Eloquent\Model;

class DocumentProfile extends Model
{
	public function Profile() {
		return $this->belongsTo('clinica\Profile');
	}
}
