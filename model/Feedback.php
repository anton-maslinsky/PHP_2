<?php


namespace app\model;


class Feedback extends  Model
{
    public $id;
    public $name;
    public $feedback;

    public function __construct($name = null, $feedback = null)
    {
        $this->name = $name;
        $this->feedback = $feedback;
    }

    public function getTableName()
    {
        return 'feedback';
    }
}