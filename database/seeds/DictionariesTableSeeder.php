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
             'unique_nickname' => 'my original Merriam-Webster',
             'title' => 'The Merriam-Webster Dictionary, Home and Office Edition',
             'year_published' => '1998',
             'year_acquired' => '2000',
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
              'year_acquired' => '1980',
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


    }
}
