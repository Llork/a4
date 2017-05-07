<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dictionary;
use App\Item;
use Session;

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
        $now = \Carbon\Carbon::now()->toDateTimeString();
        return view('items.new')->with([
            'dictionaryList' => $dictionaryList,
            'now' => $now
        ]);
    } // end of createNewItem function

    /**
    * POST
    * /new
    * Add a new item
    */
    public function saveNewItem(Request $request) {

        // validate the request.  To prevent empty image_url and more_info_link
        // fields from causing validation errors, I had to include 'nullable':
        $this->validate($request, [
            'type' => 'required',
            'summary' => 'required',
            'incident_date' => 'required|date',
            'image_url' => 'nullable|url',
            'more_info_link' => 'nullable|url'
        ]);

        // instantiate a new object from the Item class:
        $newItem = new Item();

        // dump($newItem);
        //dump($request);

        // assign form (request) data to the new object:
        $newItem->type = $request->type;
        $newItem->summary = $request->summary;
        $newItem->dictionary_word1 = $request->dictionary_word1;
        $newItem->dictionary_word2 = $request->dictionary_word2;
        $newItem->dictionary_word3 = $request->dictionary_word3;
        $newItem->description = $request->description;
        $newItem->incident_date = $request->incident_date;
        $newItem->image_url = $request->image_url;
        $newItem->more_info_link = $request->more_info_link;
        $newItem->dictionary_id = $request->dictionary_id;

        // save the data to the items table:
        $newItem->save();

        // display a message on home page that new item was added:
        Session::flash('message', 'The item \'' . $request->summary . '\' was added.');

        // Redirect to the home page:
        return redirect('/');

    } // end of saveNewItem function









}
