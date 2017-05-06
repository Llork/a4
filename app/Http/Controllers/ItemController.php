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

        // validate the request.  To prevent empty image_url and more_info_link
        // fields from causing validation errors, I had to include 'nullable':
        $this->validate($request, [
            'summary' => 'required',
            'incident_date' => 'required|date',
            'image_url' => 'nullable|url',
            'more_info_link' => 'nullable|url'
        ]);

        // instantiate a new object from the Item class:
        $newItem = new Item();

        // assign form (request) data to the new object:
        $newItem->type = $request->type;
        $newItem->summary = $request->summary;
        $newItem->incident_date = $request->incident_date;

        // save the data to the items table:
        $newItem->save();
    }









}
