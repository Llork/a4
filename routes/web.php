<?php

/*
|--------------------------------------------------------------------------
| ItemController Web Routes (an 'item' is a synchronicity):
|--------------------------------------------------------------------------
*/

Route::get('/', 'ItemController@index');

Route::get('/new', 'ItemController@createNewItem');
Route::post('/new', 'ItemController@saveNewItem');

Route::get('/edit/{id}', 'ItemController@editItem');
Route::post('/edit', 'ItemController@saveItemEdits');

Route::get('/delete/{id}', 'ItemController@deleteItem');
Route::post('/delete', 'ItemController@reallyDeleteItem');

Route::get('/itemsfordictionary/{id}', 'ItemController@itemsForDictionary');


/*
|--------------------------------------------------------------------------
| DictionaryController Web Routes:
|--------------------------------------------------------------------------
*/

Route::get('/dictionaries', 'DictionaryController@dictionaries');

Route::get('/new_dictionary', 'DictionaryController@createNewDictionary');
Route::post('/new_dictionary', 'DictionaryController@saveNewDictionary');

Route::get('/edit_dictionary/{id}', 'DictionaryController@editDictionary');
Route::post('/edit_dictionary', 'DictionaryController@saveDictionaryEdits');

Route::get('/delete_dictionary/{id}', 'DictionaryController@deleteDictionary');
Route::post('/delete_dictionary', 'DictionaryController@reallyDeleteDictionary');


/**
* Drop then create database a4
* (only accessible locally)
*/
if(App::environment('local')) {

    Route::get('/drop', function() {

        DB::statement('DROP database a4');
        DB::statement('CREATE database a4');

        return 'Dropped database a4; created database a4.';
    });
};


/**
* Log viewer
* (only be accessible locally)
*/
if(config('app.env') == 'local') {
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}
