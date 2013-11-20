<?php

class BaseModel extends Eloquent 
{

    public $v;

    public function validate($input = null) {

        if (is_null($input)) {
            $input = Input::all();
        }

        $this->v = Validator::make($input, static::$rules);

        if ($this->v->passes()) {
            return true;
        } else {
            // save the input to the current session
            Input::flash();
            return false;
        }
    }

}