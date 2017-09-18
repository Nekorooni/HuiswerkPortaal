<?php

class Homework extends Model {

    protected $subject_id;
    protected $group_id;
    protected $title;
    protected $deadline;


    protected static function newModel($obj)
    {
        // TODO: Implement newModel() method.
        return true;
    }
}