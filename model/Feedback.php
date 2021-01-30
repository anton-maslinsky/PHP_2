<?php


namespace app\model;


class Feedback extends  DbModel
{
    public $id;
    public $name;
    public $feedback;

    public function __construct($name = null, $feedback = null)
    {
        $this->name = $name;
        $this->feedback = $feedback;
    }

    public static function getTableName()
    {
        return 'feedback';
    }
}