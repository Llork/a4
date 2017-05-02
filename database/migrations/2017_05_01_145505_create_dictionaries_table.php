<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDictionariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // CREATE THE DICTIONARIES TABLE:

     	Schema::create('dictionaries', function (Blueprint $table) {

     		# Increments method will make a Primary, Auto-Incrementing field.
     		# Most tables start off this way
     		$table->increments('id');

     		# This generates two columns: `created_at` and `updated_at` to
     		# keep track of changes to a row
     		$table->timestamps();

     		# The rest of the fields...
            $table->string('unique_nickname')->unique();
            $table->string('title');
            $table->integer('year_published')->nullable();
            $table->string('year_acquired')->nullable();
            $table->string('cover_type')->nullable();
            $table->string('cover_color')->nullable();
            $table->integer('pages')->nullable();
            $table->integer('columns_per_page')->nullable();
            $table->string('location')->nullable();
     		$table->text('comments')->nullable();
            $table->string('image_url')->nullable();
     		$table->string('more_info_link')->nullable();

     	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // DROP THE DICTIONARIES TABLE:

	       Schema::drop('dictionaries');

    }
}
