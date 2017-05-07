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
             'summary' => 'Franklin Pierce',
             'dictionary_word1' => null,
             'dictionary_word2' => null,
             'dictionary_word3' => null,
             'description' => 'On April 17, 2014, I found a dollar coin on the way home from work: Franklin Pierce, from the US Presidents series of the US Mint.  This was the first time I’d ever held one of these coins in my hand.  I showed my wife Elizabeth when I got home.  An hour later on game show Jeopardy, the correct response for Final Jeopardy was “who is Franklin Pierce”.  According to website J-Archive.com, this is the only time since Alex Trebek joined Jeopardy in the 1980’s that Franklin Pierce was the Final Jeopardy correct response.',
             'incident_date' => '2014/04/17',
             'dictionary_id' => 1,
             'image_url' => 'images/items/franklin_pierce.jpg',
             'more_info_link' => null
        ]);

        Item::insert([
               'created_at' => Carbon\Carbon::now()->toDateTimeString(),
               'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
               'summary' => 'Lyons',
               'dictionary_word1' => null,
               'dictionary_word2' => null,
               'dictionary_word3' => null,
               'description' => 'On March 2, 2017, I had my yearly medical checkup at Dedham Medical Associates, which is located at 1 Lyons Street, Dedham, Massachusetts.  The next day at work (Harvard Business School), someone posted a video about Jenna Lyons.  Of the thousands of videos in our video repository, this is the only one with ‘Lyons’ in the title.',
               'incident_date' => '2017/03/03',
               'dictionary_id' => 1,
               'image_url' => null,
               'more_info_link' => 'http://www.hbs.edu/about/video.aspx?v=1_963zmf24'
        ]);

        Item::insert([
               'created_at' => Carbon\Carbon::now()->toDateTimeString(),
               'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
               'summary' => 'Everything’s Coming Up Pizza',
               'dictionary_word1' => null,
               'dictionary_word2' => null,
               'dictionary_word3' => null,
               'description' => 'Most weeks, I don’t have any pizza, but in the 4-day period from February 22-25, 2017, I had pizza from 3 different sources: Elizabeth made Pizza Uno for supper, I bought a slice at Regina Pizzeria (South Station train terminal, Boston), and Sarah gave me two slices of Trader Joe’s pizza. Two days later on the game show Jeopardy, the two lead categories were ‘Pizza’ and ‘By The Slice’.  This was the first time that ‘Pizza’ was a Jeopardy category since October 8, 2015.',
               'incident_date' => '2017/02/27',
               'dictionary_id' => 1,
               'image_url' => null,
               'more_info_link' => 'http://j-archive.com/showgame.php?game_id=5545'
        ]);

        Item::insert([
              'created_at' => Carbon\Carbon::now()->toDateTimeString(),
              'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
              'summary' => 'Oak Tree',
              'dictionary_word1' => 'oar',
              'dictionary_word2' => 'oak',
              'dictionary_word3' => null,
              'description' => 'On May 1, 2017, tree work was done at my house for only the second time since we moved here in 1994.  The main thing done was removal of a huge, dead oak tree limb.  After they left, I flipped the dictionary open.  I landed on (that is, my finger was directly on) ‘oar’, with ‘oak’ only 1/4 inch from my finger.',
              'incident_date' => '2017/01/17',
              'dictionary_id' => 3,
              'image_url' => null,
              'more_info_link' => null
        ]);

        Item::insert([
                 'created_at' => Carbon\Carbon::now()->toDateTimeString(),
                 'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
                 'summary' => 'Hungry Hawk',
                 'dictionary_word1' => 'gormandize',
                 'dictionary_word2' => 'ravenously',
                 'dictionary_word3' => null,
                 'description' => 'On April 29, 2017, a hawk tried to catch a chipmunk in our yard.  I feed the outdoor wildlife (mostly with sunflower seeds) so at any given time I can usually see a chipmunk outside, but this is the first time I witnessed a hawk swooping down in an attempt to catch one.  I then flipped open the dictionary, landed on ‘gormandize’, a word that I don’t recall hearing before.  It means ‘to eat ravenously’ (which makes me wonder if ‘ravenous’ is related to the word ‘raven’).',
                 'incident_date' => '2017/04/29',
                 'dictionary_id' => 3,
                 'image_url' => null,
                 'more_info_link' => null
        ]);

        Item::insert([
                  'created_at' => Carbon\Carbon::now()->toDateTimeString(),
                  'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
                  'summary' => 'Bugs and More Bugs',
                  'dictionary_word1' => 'manual',
                  'dictionary_word2' => 'mantra',
                  'dictionary_word3' => null,
                  'description' => 'On September 23, 2016, I said ‘bugs, bugs, bugs, bugs’, about 10 times in a row. Then I flipped open the dictionary, landed on ‘manual’, but the word right before this, only a fraction of an inch from my finger, was ‘mantra: a word repeated to aid in concentration during meditation’.',
                  'incident_date' => '2016/09/23',
                  'dictionary_id' => 2,
                  'image_url' => null,
                  'more_info_link' => null
        ]);

        Item::insert([
                   'created_at' => Carbon\Carbon::now()->toDateTimeString(),
                   'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
                   'summary' => 'Big Brother',
                   'dictionary_word1' => 'kinsman',
                   'dictionary_word2' => null,
                   'dictionary_word3' => null,
                   'description' => 'While Elizabeth was on the phone with her older brother Richard, I flipped open the dictionary.  Landed on ‘kinsman: a relative, especially a male one’.',
                   'incident_date' => '2016/12/10',
                   'dictionary_id' => 3,
                   'image_url' => null,
                   'more_info_link' => null
        ]);

        Item::insert([
                    'created_at' => Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
                    'summary' => 'Losing a Pet',
                    'dictionary_word1' => 'palm civet',
                    'dictionary_word2' => null,
                    'dictionary_word3' => null,
                    'description' => 'Just before digging a hole to bury our pet gerbil ‘Diamond’ who passed away (gerbils only live to be 2 or 3, typically), I flipped open the dictonary, landed on ‘palm civet’, which it says is a mammal with a long tail and gray or brown fur.',
                    'incident_date' => '2016/12/11',
                    'dictionary_id' => 4,
                    'image_url' => null,
                    'more_info_link' => null
        ]);

    }
}
