<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        $this->call(DictionariesTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(TopicsTableSeeder::class);
        $this->call(ItemTopicTableSeeder::class);
    }
}
