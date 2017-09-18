<?php

class Homework extends Model {

    protected $subject_id;
    protected $group_id;
    protected $title;
    protected $deadline;

    public function getGroup(){
        return $this->group_id;
    }


    public function getTitle(){
        return $this->title;
    }

    public function getDeadline(){
        return $this->deadline;
    }


    protected static function newModel($obj)
    {
        // TODO: Implement newModel() method.
        return true;
    }
}