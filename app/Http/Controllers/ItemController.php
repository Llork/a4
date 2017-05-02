<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dictionary;
use App\Item;

class ItemController extends Controller
{
    public function index() {

        # Get all rows
        $result = Item::all();
            dump($result->toArray());

        return ('Welcome to ItemController.php and Assignment 4');

    } // end of index function

}
