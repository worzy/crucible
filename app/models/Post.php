<?php

class Post extends Eloquent
{
    public $timestamps = true;

    public function comments()
    {
        return $this->hasMany('Comment');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function timeSince()
    {
    	$periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
	   	$lengths = array("60","60","24","7","4.35","12","10");

	   	$now = time();

	   	$time = $this->created_at->timestamp;

	    $difference     = $now - $time;
	    $tense          = "ago";

	   	for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
		    $difference /= $lengths[$j];
		}

	    $difference = round($difference);

	    if($difference != 1) {
	        $periods[$j].= "s";
	    }

	    return "$difference $periods[$j] ago ";
	}

}