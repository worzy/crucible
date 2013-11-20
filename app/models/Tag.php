<?php

class Tag extends BaseModel
{
    public $timestamps = true;

    public static $rules = array(
		
    );

    public function posts()
    {
        return $this->belongsToMany('Post');
    }

}