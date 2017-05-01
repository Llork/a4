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
             'title' => 'The Merriam-Webster Dictionary, Home and Office Edition',
             'year_published' => '1998',
             'year_acquired' => '2000',
             'comments' => 'Red cover. Paperback.',
             'image_url' => null,
             'more_info_link' => null
         ]);
    }
}
