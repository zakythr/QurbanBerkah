<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GambarHewan extends Model
{
	protected $fillable = [
		"hewan_id", "path"
	];

	protected $attributes = [
		"path" => null
	];
	
	public function hewan()
	{
		return $this->belongsTo("App\Hewan");
	}
}
