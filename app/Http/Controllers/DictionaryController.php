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
    * retrieve all rows from the dictionaries table
	*/

    /* IGNORE THIS FOR NOW - IT'S COMMENTED OUT AND UNDER CONSTRUCTION...
    public function index() {

        $dictionaries = Dictionary::orderBy('unique_nickname')->get(); # Database query
        return view('dictionaries.index')->with([
            'dictionaries' => $dictionaries,
        ]);
    } // end of index function
    */



}
