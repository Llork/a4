<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectItemsAndDictionaries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {

            #$table->dropColumn('dictionary');

            # Add a new INT field 'dictionary_id' that has to be unsigned (positive)
            $table->integer('dictionary_id')->unsigned()->nullable();

            # 'dictionary_id' foreign key connects to 'id' field in 'dictionaries' table
            $table->foreign('dictionary_id')->references('id')->on('dictionaries');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {

            # ref: http://laravel.com/docs/migrations#dropping-indexes
            # combine tablename + fk field name + the word "foreign"
            $table->dropForeign('items_dictionary_id_foreign');

            $table->dropColumn('dictionary_id');
        });
    }
}
