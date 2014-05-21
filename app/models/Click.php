<?php

class Click extends BaseModel
{
    public $timestamps = true;

    public static $rules = array(
		'post_id'		=> 'required',
    );

    public function post()
    {
        return $this->belongsTo('Post');
    }
    
}