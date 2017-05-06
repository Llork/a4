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

    /**
    * POST
    * /new
    * Add a new item
    */
    public function saveNewItem(Request $request) {

        // instantiate a new object from the Item class:
        $newItem = new Item();
        $newItem->type = 'general';
        $newItem->summary = 'insert test 02';
        $newItem->incident_date = '2014/05/06';

        # Invoke the Eloquent `save` method to generate a new row in the
        # `books` table, with the above data
        #this is also known as 'persisting' the data to the database
        $newItem->save();
/*
        dump($request->all());

        $this->validate($request, [
            'summary' => 'required',
            'incident_date' => 'required|date',
            'image_url' => 'url',
            'more_info_link' => 'url'
        ]);
*/
        //return 'now in post version of createNewItem';

    }









}
