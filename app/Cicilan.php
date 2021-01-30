<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cicilan extends Model
{
  protected $attributes = [
		"status" => 0
	];

	public function user()
	{
		return $this->belongsTo("App\User");
	}
}
