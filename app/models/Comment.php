<?php

class Comment extends BaseModel
{
    protected $table = 'comments';
    public $timestamps = true;

    public static $rules = array(
        'content'     => 'required',
        //'user_id'     => 'required',
    );

    public function post()
    {
        return $this->belongsTo('Post');
    }

    public function user()
    {
    	return $this->belongsTo('User');
    }

}