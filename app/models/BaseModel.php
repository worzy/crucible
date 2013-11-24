<?php

class BaseModel extends Eloquent 
{

    public $v;

    public function validate($input = null) {

        if (is_null($input)) {
            $input = Input::all();
        }

        $messages = array();

        if(!empty(static::$messages))
        {
            $messages = static::$messages;
        }

        $this->v = Validator::make($input, static::$rules, $messages);

        if ($this->v->passes()) {
            return true;
        } else {
            // save the input to the current session
            Input::flash();
            return false;
        }
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