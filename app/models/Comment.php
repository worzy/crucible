<?php

class Comment extends BaseModel
{
    protected $table = 'comments';
    public $timestamps = true;

    public function post()
    {
        return $this->belongsTo('Post');
    }

}