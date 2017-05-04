<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migration.     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('topic_name');
        });
    }

    /**
     * Reverse the migration.     *
     * @return void
     */
    public function down()
    {
        Schema::drop('topics');
    }
}
