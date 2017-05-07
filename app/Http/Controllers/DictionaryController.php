<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dictionary;
use App\Item;
use Session;

class DictionaryController extends Controller
{
    /**
	* GET
    * /
    * retrieve all rows from the dictionaries table except for the 'none'
    * and 'unknown' rows:
	*/

    public function dictionaries() {

        $dictionaries = Dictionary::where('unique_nickname', '!=', 'none')->where('unique_nickname', '!=', 'unknown')->orderBy('id')->get(); # Database query
        return view('dictionaries.dictionaries')->with([
            'dictionaries' => $dictionaries,
        ]);
    } // end of dictionaries function


}
