<?php

namespace clinica;

use Illuminate\Database\Eloquent\Model;

class DocumentStudy extends Model
{
	public function LaboratoryStudy()	{
		return $this->belongsTo('clinica\LaboratoryStudy');
		return $this->belongsTo('clinica\RxStudy');
		return $this->belongsTo('clinica\EcoStudy');
	}
}
