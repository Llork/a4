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

         Item::insert([
              'created_at' => Carbon\Carbon::now()->toDateTimeString(),
              'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
              'type' => 'dictionary',
              'summary' => 'oak tree',
              'description' => 'On May 1, 2017, tree work was done at my house for only the second time since we moved here in 1994.  The main thing done was removal of a huge, dead oak tree limb.  After they left, I flipped dictionary open.  Landed on ‘oar’, with ‘oak’ only 1/4 inch from my finger.',
              'incident_date' => '2014/04/17',
              'dictionary' => 'my original Merriam-Webster',
              'image_url' => null,
              'more_info_link' => null
          ]);

    }
}
