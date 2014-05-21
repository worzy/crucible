<?php

class Post extends BaseModel
{
    public $timestamps = true;

    public static $rules = array(
		'title'		=> 'required|min:6',
		'url'		=> 'required|url|unique:posts,url',
    );

    public static $messages = array(
        'url.unique' => 'The URL has already been posted.',
    );

    public function comments()
    {
        return $this->hasMany('Comment');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function tags()
    {
        return $this->belongsToMany('Tag');
    }

    public function clicks()
    {
        return $this->hasMany('Click');
    }
    
}