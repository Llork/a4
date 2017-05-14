<?php

use Illuminate\Database\Seeder;
use App\Item;
use App\Topic;

class ItemTopicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create an array of the items to associate topics with
        // key is item's summary, and value is array of topics:

        $items =[
            'Lyons' => ['work'],
            'Oak Tree' => ['dictionary','home'],
            'Franklin Pierce' => ['commute','found objects','jeopardy']
        ];

        # loop through the array, creating a new pivot for each item to topic with topic
        foreach($items as $summary => $topics) {

            # First get the item
            $item = Item::where('summary','like',$summary)->first();

            //dd($item);
            //dump($item);

            # Loop through each topic for this item, adding the pivot
            foreach($topics as $topicName) {
                $topic = Topic::where('topic_name','LIKE',$topicName)->first();

                # Connect this topic to this item
                $item->topics()->save($topic);

            } // end of inner foreach

        } // end of outer foreach

    } // end of function

} // end of class
