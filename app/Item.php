<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
	*
	*/
    public function dictionary() {
		# Item belongs to Dictionary
		# Define an inverse one-to-many relationship.
		return $this->belongsTo('App\Dictionary');
	}
}
