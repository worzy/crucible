<?php

class Comment extends Eloquent
{
    protected $table = 'comments';
    public $timestamps = true;

    public function post()
    {
        return $this->belongsTo('Post');
    }

}