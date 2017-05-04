<?php

use Illuminate\Database\Seeder;
use App\Topic;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $topics = ['dictionary', 'jeopardy', 'found objects', 'commute', 'work', 'home', 'news'];

        foreach($topics as $topicName) {
            $topic = new Topic();
            $topic->topic_name = $topicName;
            $topic->save();
        }
    }
}
