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
	} // end of fuction items()

    /**
	*
	*/
    public static function getDictionaryList() {
        # Get the dictionaries for use in dropdown menus
        $dictionaries = Dictionary::orderBy('unique_nickname', 'ASC')->get();
        # Put dictionaries into array where the key = dictionary id and value = unique nickname
        $dictionaryList = [];
        foreach($dictionaries as $dictionary) {
            $dictionaryList[$dictionary->id] = $dictionary->unique_nickname;
        }
        return $dictionaryList;
    } // end of function getDictionaryList()


}
