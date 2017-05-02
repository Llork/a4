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

    /*  $result = Item::all();
        dump($result->toArray());

        return ('Welcome to ItemController.php and Assignment 4');*/

    } // end of index function

}
