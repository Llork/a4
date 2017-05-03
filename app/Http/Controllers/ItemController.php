<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dictionary;
use App\Item;

class ItemController extends Controller
{
    /**
	* GET
    * /
    * retrieve all rows from the items table
	*/
    public function index() {
        $items = Item::orderBy('summary')->get(); # Database query
        return view('items.index')->with([
            'items' => $items,
        ]);
    } // end of index function


    /**
    * GET
    * /new
    * Add a new item
    */
    public function createNewItem(Request $request) {
        $dictionaryList = Dictionary::getDictionaryList();
        return view('items.new')->with([
            'dictionaryList' => $dictionaryList
        ]);
    }


}
