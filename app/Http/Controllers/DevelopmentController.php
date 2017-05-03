<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dictionary;
use App\Item;

/* SAVE THIS TO YOUR TUTORIAL FILES BEFORE DELETING IT! */

class DevelopmentController extends Controller
{
    public function dev2() {

        # Eager load the dictionary with the item ('with' is the keyword causing eager loading):
        $items = Item::with('dictionary')->get();

        echo '<b>This works, even for rows that use no dictionary.</b><br>';
        echo '<b>it uses ARRAY notation for the dictionary title:</b><br>';
        foreach($items as $item) {
            echo 'Item \'' . $item->summary . '\' uses ' .  $item->dictionary['title'] . '.<br>';
        }
        echo '<br><br>';


        echo '<b>But even though with array notation it wasn’t crashing on the rows with no dictionary,</b><br>';
        echo '<b>I added a conditional so that it displays better:</b><br>';
        foreach($items as $item) {
            if(isset($item->dictionary['title'])) {
                echo 'Item \'' . $item->summary . '\' uses ' .  $item->dictionary['title'] . '.<br>';
            }
            else {
                echo 'Item \'' . $item->summary . '\' uses no dictionary.<br>';
            }
        }
        echo '<br><br>';


        # The following doesn't work, it uses object notation for the dictionary title,
        # and the rows that use no dictionary causes it to crash with the error message
        # "Trying to get property of non-object"
        // foreach($items as $item) {
        //     echo 'Item \'' . $item->summary . '\' uses ' .  $item->dictionary->title . '.<br>';
        # To fix, either use array notation as shown above (array notation is forgiving of
        # rows that use no dictionary, it seems) or use the following conditional:

        echo '<b>This uses OBJECT notation for the dictionary title. I had to prevent it</b><br>';
        echo '<b>from trying to display null dictionaries, which was the causing fatal error</b><br>';
        echo '<b><i>"Trying to get property of non-object":</i></b><br>';

        foreach($items as $item) {
            if(isset($item->dictionary->title)) {
                echo 'Item \'' . $item->summary . '\' uses ' .  $item->dictionary->title . '.<br>';
            }
            else {
                echo 'Item \'' . $item->summary . '\' uses no dictionary.<br>';
            }
        }

    } // end of function dev2






    public function dev1() {

        # Get the first item that uses a dictionary
        $item = Item::where('dictionary_id', '>', 0)->first();

        # Get the dictionary for this item using the "dictionary"
        # relationship method defined in the Item model
        $dictionary = $item->dictionary;

        # This outputs
        # Item 'Oak Tree' used The Merriam-Webster Dictionary, Home and Office Edition
        echo('Item \'' . $item->summary . '\' used ' . $dictionary->title);
        #dump($book->toArray());

    } // end of function dev1





} // end of DevelopmentController class
