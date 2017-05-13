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


    /**
    * GET
    * /new_dictionary
    * Add a new dictionary
    */
    public function createNewDictionary(Request $request) {
        $now = \Carbon\Carbon::now()->toDateTimeString();
        return view('dictionaries.newdictionary')->with([
            'now' => $now
        ]);
    } // end of createNewDictionary function

    /**
    * POST
    * /new_dictionary
    * Add a new dictionary
    */
    public function saveNewDictionary(Request $request) {

        $messages = [
            'unique_nickname.unique' => 'The unique nickname of \'' . $request->unique_nickname . '\' has already been taken.',
        ];

        // validate the request.  To prevent empty image_url and more_info_link
        // fields from causing validation errors, I had to include 'nullable':
        $this->validate($request, [
            'unique_nickname' => 'required|unique:dictionaries,unique_nickname',
            'title' => 'required',
            'image_url' => 'nullable|url',
            'more_info_link' => 'nullable|url'
        ], $messages);

        // instantiate a new object from the Item class:
        $newDictionary = new Dictionary();

        // dump($newDictionary);
        //dump($request);

        // assign form (request) data to the new object:
        $newDictionary->unique_nickname = $request->unique_nickname;
        $newDictionary->title = $request->title;
        $newDictionary->year_published = $request->year_published;
        $newDictionary->year_acquired = $request->year_acquired;
        $newDictionary->cover_type = $request->cover_type;
        $newDictionary->cover_color = $request->cover_color;
        $newDictionary->pages = $request->pages;
        $newDictionary->columns_per_page = $request->columns_per_page;
        $newDictionary->location = $request->location;
        $newDictionary->comments = $request->comments;
        $newDictionary->image_url = $request->image_url;
        $newDictionary->more_info_link = $request->more_info_link;

        // save the data to the items table:
        $newDictionary->save();

        // display a message on home page that new item was added:
        Session::flash('message', 'The dictionary \'' . $request->unique_nickname . '\' was added.');

        // Redirect to the dictionaries page:
        return redirect('/dictionaries');

    } // end of saveNewDictionary function


    /**
    * GET
    * /edit_dictionary/{id}
    * Edit a dictionary
    */
    public function editDictionary($id) {

        $dictionary = Dictionary::find($id);

        if(is_null($dictionary)) {
            Session::flash('message', 'The dictionary that you requested was not found.');
            return redirect('/dictionaries');
        }

        $now = \Carbon\Carbon::now()->toDateTimeString();
        return view('dictionaries.editdictionary')->with([
            'now' => $now,
            'id' => $id,
            'dictionary' => $dictionary
        ]);

    } // end of editDictionary function


    /**
    * POST
    * /edit
    * Edit a dictionary
    */
    public function saveDictionaryEdits(Request $request) {

        //return 'now in the post function saveDictionaryEdits';

        $messages = [
            'unique_nickname.unique' => 'The unique nickname of \'' . $request->unique_nickname . '\' has already been taken.',
        ];

        // validate the request:
        $this->validate($request, [

        // credit to https://laracasts.com/discuss/channels/requests/problem-with-unique-field-validation-on-update
        // for providing solution to the problem where unique_nickname 'unique' validation was failing for the
        // inane reason that the unique_nickname is equal to ITSELF!  I mean, what a dumb
        // default behavior for Laravel, it's like saying "sorry, this email address is already
        // taken -- by you -- so you'll need to change it to something else..."
        // By adding .$request->id to the following line, I'm tell Laravel to ignore the
        // row being edited when seeing if the unique_nickname already exists in the
        // dictionaries table:
            'unique_nickname' => 'bail|required|unique:dictionaries,unique_nickname,'.$request->id,

            'title' => 'required',

            //commnted out because it wasn't letting me have relative image urls:
            //'image_url' => 'nullable|url',

            // To prevent empty more_info_link field from causing validation errors,
            // I had to include 'nullable':
            'more_info_link' => 'nullable|url'
        ], $messages);


        // get the existing dictionary from the database:
        $existingDictionary = Dictionary::find($request->id);

        // dump($existingDictionary);
        //dump($request);

        // assign form (request) data to the existing dictionary:
        $existingDictionary->unique_nickname = $request->unique_nickname;
        $existingDictionary->title = $request->title;
        //$existingDictionary->title = 'this is a test';
        $existingDictionary->year_published = $request->year_published;
        $existingDictionary->year_acquired = $request->year_acquired;
        $existingDictionary->cover_type = $request->cover_type;
        $existingDictionary->cover_color = $request->cover_color;
        $existingDictionary->pages = $request->pages;
        $existingDictionary->columns_per_page = $request->columns_per_page;
        $existingDictionary->location = $request->location;
        $existingDictionary->comments = $request->comments;
        $existingDictionary->image_url = $request->image_url;
        $existingDictionary->more_info_link = $request->more_info_link;

        //dump($existingDictionary);

        // save the data to the dictionaries table:
        $existingDictionary->save();

        // Redirect to the same edit page in case they want to do more editing of the dictionary,
        // and include a flash message that update took place:
        Session::flash('message', 'The dictionary \'' . $request->unique_nickname . '\' was changed.');
        return redirect('/edit_dictionary/'.$request->id);

    } // end of editDictionary function


    /**
    * GET
    * Ask if user is sure they'd like to delete dictionary
    */
    public function deleteDictionary($id) {
        $dictionary = Dictionary::find($id);

        if(is_null($dictionary)) {
            Session::flash('message', 'The dictionary that you asked to delete was not found.');
            return redirect('/dictionaries');
        }

        // determine if the dictionary is being used in items:
        $items = Item::where('dictionary_id', '=', $id)->get();
        if (count($items)==0) {
            // No items are using this dictionary, so go ahead and display the "are you sure" page:
            //dump($items);
            return view('dictionaries.deletedictionary')->with('dictionary', $dictionary);
        }
        else {
            // A good enhancement would be to display a page with these items, allowing the user to
            // edit or delete them, to clear the way towards deleting the dictionary:
            Session::flash('message', 'Items with this dictionary id were found, they have to be deleted or edited first.');
            //dump($items);
            return redirect('/dictionaries');
        }

    } // end of deleteDictionary function


    /**
    * POST
    * Delete the dictionary
    */
    public function reallyDeleteDictionary(Request $request) {

        $dictionary = Dictionary::find($request->id);
        if(is_null($dictionary)) {
            Session::flash('message', 'Deletion was unsuccessful, the dictionary that you asked to delete was not found.');
            return redirect('/dictionaries');
        }

        // delete the table row:
        $dictionary->delete();

        Session::flash('message', '\'' . $dictionary->unique_nickname . '\' was deleted.');
        return redirect('/dictionaries');

    } // end of reallyDeleteDictionary function



}
