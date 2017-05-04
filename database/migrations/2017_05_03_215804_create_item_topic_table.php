<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTopicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_topic', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();

            # item_id and topic_id are foreign keys, therefore must be unsigned
            # field names correspond to the tables they connect
            # item_id references the items table and topic_id references the topics table.
            $table->integer('item_id')->unsigned();
            $table->integer('topic_id')->unsigned();

            # Make foreign keys
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('topic_id')->references('id')->on('topics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('item_topic');
    }
}
