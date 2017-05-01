<?php

use Illuminate\Database\Seeder;
use App\Item;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::insert([
             'created_at' => Carbon\Carbon::now()->toDateTimeString(),
             'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
             'type' => 'general',
             'summary' => 'Franklin Pierce coin and Final Jeopardy correct response',
             'description' => 'On April 17, 2014, I found a dollar coin on the way home from work: Franklin Pierce, from the US Presidents series of the US Mint.  This was the first time I’d ever held one of these coins in my hand.  I showed my wife Elizabeth when I got home.  An hour later on game show Jeopardy, the correct response for Final Jeopardy was “who is Franklin Pierce”.  According to website J-Archive.com, this is the only time since Alex Trebek joined Jeopardy in the 1980’s that Franklin Pierce was the Final Jeopardy correct response.',
             'incident_date' => '2014/04/17',
             'dictionary' => null,
             'image_url' => null,
             'more_info_link' => null
         ]);
    }
}
