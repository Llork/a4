<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // CREATE THE ITEMS TABLE:

     	Schema::create('items', function (Blueprint $table) {

     		# Increments method will make a Primary, Auto-Incrementing field.
     		# Most tables start off this way
     		$table->increments('id');

     		# This generates two columns: `created_at` and `updated_at` to
     		# keep track of changes to a row
     		$table->timestamps();

     		# The rest of the fields...
     		$table->string('type');
            $table->string('summary');
            $table->string('dictionary_word1')->nullable();
            $table->string('dictionary_word2')->nullable();
            $table->string('dictionary_word3')->nullable();
     		$table->text('description')->nullable();            
     		$table->date('incident_date');

     		$table->string('image_url')->nullable();
     		$table->string('more_info_link')->nullable();

     		# FYI: skipping the 'tags' field for now, since I still have to view lecture 13...

     	});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // DROP THE BOOKS TABLE:

 	       Schema::drop('items');
    }
}
