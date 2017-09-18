<?php

class Submission extends Model {

    protected $homework_id;
    protected $student_id;
    protected $timestamp;
    protected $content;


    protected static function newModel($obj)
    {
        // TODO: Implement newModel() method.
        return true;
    }
}