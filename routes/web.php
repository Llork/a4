<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// CODE USED DURING DEVELOPMENT (WHAT FOOBOOKS CALLS 'PRACTICE'):
// MAKE SURE TO SAVE DevelopmentController.php to your tutorial files before
// deleting it when you submit A4!
Route::get('/dev1', 'DevelopmentController@dev1');
Route::get('/dev2', 'DevelopmentController@dev2');
Route::get('/dev3', 'DevelopmentController@dev3');
Route::get('/dev4', 'DevelopmentController@dev4');


/**
* GET
* /
*/
Route::get('/', 'ItemController@index');

/**
* GET
* /new
*/
Route::get('/new', 'ItemController@createNewItem');

/**
* POST
* /new
*/
Route::post('/new', 'ItemController@saveNewItem');

// Temporarily added this debug route which is from around Lecture 10:
Route::get('/debug', function() {
	echo '<pre>';
	echo '<h1>Environment</h1>';
	echo App::environment().'</h1>';
	echo '<h1>Debugging?</h1>';
	if(config('app.debug')) echo "Yes"; else echo "No";
	echo '<h1>Database Config</h1>';
    echo 'DB defaultStringLength: '.Illuminate\Database\Schema\Builder::$defaultStringLength;
    /*
    The following commented out line will print your MySQL credentials.
    Uncomment this line only if you're facing difficulties connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your production server, making your credentials public.
    */
	//print_r(config('database.connections.mysql'));
	echo '<h1>Test Database Connection</h1>';
	try {
		$results = DB::select('SHOW DATABASES;');
		echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
		echo "<br><br>Your Databases:<br><br>";
		print_r($results);
	}
	catch (Exception $e) {
		echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
	}
	echo '</pre>';
});




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
* (only accessible locally)
*/
//if(config('app.env') == 'local') {
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
//}

/* commented out 4-30-2017:
Route::get('/', function () {
    return view('welcome');
});
*/
