<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{

    public function items() {
        return $this->belongsToMany('App\Item')->withTimestamps();
    }


    public static function getTopicsForCheckboxes() {
        $topics = Topic::orderBy('topic_name','ASC')->get();
        $topicsForCheckboxes = [];
        foreach($topics as $topic) {
            $topicsForCheckboxes[$topic['id']] = $topic->topic_name;
        }
        return $topicsForCheckboxes;
    }

}
