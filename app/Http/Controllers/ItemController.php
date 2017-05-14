<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dictionary;
use App\Item;
use App\Topic;
use Session;

class ItemController extends Controller
{
    /**
	* GET
    * /
    * retrieve all rows from the items table
	*/
    public function index() {
        $items = Item::orderBy('summary')->get(); // Database query

        return view('items.index')->with([
            'items' => $items,
        ]);

    } // end of index function


    /**
	* GET
    * /
    * retrieve only those rows from the items table which mention the specified dictionary
	*/
    public function itemsForDictionary($id) {
        $items = Item::orderBy('summary')->where('dictionary_id', '=', $id)->get(); // Database query
        $dictionary = Dictionary::find($id);

        return view('items.itemsfordictionary')->with([
            'dictionary' => $dictionary,
            'items' => $items
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

        $messages = [
            'incident_date.date_format' => 'Incident Date must be yyyy-mm-dd (not yyyy-m-d, yyyy/mm/dd, mm-dd-yyyy etc).',
        ];

        // validate the request.  To prevent empty image_url and more_info_link
        // fields from causing validation errors, I had to include 'nullable':
        $this->validate($request, [
            'summary' => 'required',
            'incident_date' => 'required|date_format:Y-m-d',
            //commented out because it won't let me have relative image urls:
            //'image_url' => 'nullable|url',
            'more_info_link' => 'nullable|url',
            'dictionary_id' => 'required'
        ], $messages);

        // instantiate a new object from the Item class:
        $newItem = new Item();

        // assign form (request) data to the new object:
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


    /**
    * GET
    * /edit/{id}
    * Edit an item
    */
    public function editItem($id) {

        $item = Item::with('topics')->find($id);

        // Get all available topics to list in checkboxes on the view:
        $topicsForCheckboxes = Topic::getTopicsForCheckboxes();

        // Determine which topics this item already has associated with it,
        // so that we know which checkboxes to check when the view first loads:
        $topicsForExistingItem = [];
        foreach($item->topics as $topic) {
            $topicsForExistingItem[] = $topic->topic_name;
        }

        if(is_null($item)) {
            Session::flash('message', 'The synchronicity that you requested was not found.');
            return redirect('/');
        }

        $dictionaryList = Dictionary::getDictionaryList();
        $now = \Carbon\Carbon::now()->toDateTimeString();
        return view('items.edit')->with([
            'dictionaryList' => $dictionaryList,
            'topicsForCheckboxes' => $topicsForCheckboxes,
            'topicsForExistingItem' => $topicsForExistingItem,
            'now' => $now,
            'id' => $id,
            'item' => $item
        ]);

    } // end of editItem function


    /**
    * POST
    * /edit
    * Edit an item
    */
    public function saveItemEdits(Request $request) {

        $messages = [
            'incident_date.date_format' => 'Incident Date must be yyyy-mm-dd (not yyyy-m-d, yyyy/mm/dd, mm-dd-yyyy etc).',
        ];

        // validate the request.  To prevent empty image_url and more_info_link
        // fields from causing validation errors, I had to include 'nullable':
        $this->validate($request, [
            'summary' => 'required',
            'incident_date' => 'required|date_format:Y-m-d',
            //commented out because it won't let me have relative image urls:
            //'image_url' => 'nullable|url',
            'more_info_link' => 'nullable|url',
            'dictionary_id' => 'required'
        ], $messages);

        // Get existing item from the database:
        $existingItem = Item::find($request->id);

        // assign form (request) data to the existing item:
        $existingItem->summary = $request->summary;
        $existingItem->dictionary_word1 = $request->dictionary_word1;
        $existingItem->dictionary_word2 = $request->dictionary_word2;
        $existingItem->dictionary_word3 = $request->dictionary_word3;
        $existingItem->description = $request->description;
        $existingItem->incident_date = $request->incident_date;
        $existingItem->image_url = $request->image_url;
        $existingItem->more_info_link = $request->more_info_link;
        $existingItem->dictionary_id = $request->dictionary_id;

        // If topics were chosen, put them into the $topics array:
        if($request->topics) {
            $topics = $request->topics;
        }
        // Else if no topics were chosen, define an
        // empty array of topics:
        else {
            $topics = [];
        }

        // Sync the topics:
        $existingItem->topics()->sync($topics);

        // save the data to the items table:
        $existingItem->save();

        // Redirect to the same edit page in case they want to do more editing of the item,
        // and include a flash message that update took place:
        Session::flash('message', 'The item \'' . $request->summary . '\' was changed.');
        return redirect('/edit/'.$request->id);

    } // end of saveItemEdits function


    /**
    * GET
    * Ask if user is sure they'd like to delete item
    */
    public function deleteItem($id) {
        $item = Item::find($id);
        if(is_null($item)) {
            Session::flash('message', 'The synchronicity that you asked to delete was not found.');
            return redirect('/');
        }

        return view('items.delete')->with('item', $item);

    } // end of deleteItem function


    /**
    * POST
    * Delete the item
    */
    public function reallyDeleteItem(Request $request) {
        //return 'now in function reallyDeleteItem';

        $item = Item::find($request->id);
        if(is_null($item)) {
            Session::flash('message', 'Deletion was unsuccessful, the synchronicity that you asked to delete was not found.');
            return redirect('/');
        }

        // To allow the item to be deleted, the corresponding rows in the
        // pivot table (item_topic table) must first be deleted:
        $item->topics()->detach();

        // Delete the item (synchronicity) row:
        $item->delete();

        Session::flash('message', '\'' . $item->summary . '\' was deleted.');
        return redirect('/');

    } // end of reallyDeleteItem function


}
