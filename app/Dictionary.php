<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    /**
	* Relationship method
	*/
    public function items() {
		# Dictionary has many Items
		# Define a one-to-many relationship.
		return $this->hasMany('App\Item');
	}
}
