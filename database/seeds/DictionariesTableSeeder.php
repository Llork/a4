<?php

use Illuminate\Database\Seeder;
use App\Dictionary;

class DictionariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dictionary::insert([
             'created_at' => Carbon\Carbon::now()->toDateTimeString(),
             'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
             'unique_nickname' => 'none',
             'title' => 'no dictionary was used',
             'year_published' => null,
             'year_acquired' => null,
             'cover_type' => null,
             'cover_color' => null,
             'pages' => null,
             'columns_per_page' => null,
             'location' => null,
             'comments' => 'No dictionary was used in conjunction with this synchronicity.',
             'image_url' => null,
             'more_info_link' => null
         ]);

        Dictionary::insert([
             'created_at' => Carbon\Carbon::now()->toDateTimeString(),
             'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
             'unique_nickname' => 'unknown',
             'title' => 'I’m not sure what dictionary was used',
             'year_published' => null,
             'year_acquired' => null,
             'cover_type' => null,
             'cover_color' => null,
             'pages' => null,
             'columns_per_page' => null,
             'location' => null,
             'comments' => 'Not sure what dictionary was used. Prior to 2017, it was often true that if I didn’t specify a dictionary in my journal, it meant that I used my Merriam-Webster (dictonary_id of 1 in this database).',
             'image_url' => null,
             'more_info_link' => null
         ]);

        Dictionary::insert([
             'created_at' => Carbon\Carbon::now()->toDateTimeString(),
             'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
             'unique_nickname' => 'my original Merriam-Webster',
             'title' => 'The Merriam-Webster Dictionary, Home and Office Edition',
             'year_published' => '1998',
             'year_acquired' => 'circa 2000',
             'cover_type' => 'paperback',
             'cover_color' => 'red',
             'pages' => 704,
             'columns_per_page' => 2,
             'location' => 'home',
             'comments' => null,
             'image_url' => null,
             'more_info_link' => null
         ]);

         Dictionary::insert([
              'created_at' => Carbon\Carbon::now()->toDateTimeString(),
              'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
              'unique_nickname' => 'my original red American Heritage',
              'title' => 'The American Heritage Dictionary of the English Language',
              'year_published' => '1978',
              'year_acquired' => 'circa 1980',
              'cover_type' => 'hardcover',
              'cover_color' => 'red',
              'pages' => 1550,
              'columns_per_page' => 2,
              'location' => 'home',
              'comments' => null,
              'image_url' => null,
              'more_info_link' => null
          ]);

          Dictionary::insert([
               'created_at' => Carbon\Carbon::now()->toDateTimeString(),
               'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
               'unique_nickname' => 'Mom’s American Heritage',
               'title' => 'The American Heritage Dictionary of the English Language',
               'year_published' => '1969',
               'year_acquired' => '2012',
               'cover_type' => 'hardcover',
               'cover_color' => 'brown',
               'pages' => 1550,
               'columns_per_page' => 2,
               'location' => 'home',
               'comments' => 'I inherited this dictionary when Mom passed away.',
               'image_url' => null,
               'more_info_link' => null
           ]);

           Dictionary::insert([
                'created_at' => Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
                'unique_nickname' => 'my only pocket size dictionary',
                'title' => 'Webster’s New Pocket Dictionary',
                'year_published' => '2000',
                'year_acquired' => 'circa 2005',
                'cover_type' => 'paperback',
                'cover_color' => 'red',
                'pages' => 380,
                'columns_per_page' => 2,
                'location' => 'home',
                'comments' => 'After wondering when I acquired this dictionary, took a guess and entered ‘circa 2005’. Then I flipped this dictionary open, landed on ‘Monday’.',
                'image_url' => null,
                'more_info_link' => null
            ]);


    }
}
