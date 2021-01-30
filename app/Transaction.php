<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	protected $fillables = [
		"hewan_id", "user_id"
	];

	public function user()
	{ 
		return $this->belongsTo("App\User");
	}
    
    public function hewan()
	{ 
		return $this->belongsTo("App\Hewan");
	}
}
