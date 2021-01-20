<?php


namespace app\model;


class Images extends  Model
{
    public $id;
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }


    public function getTableName()
    {
        return 'images';
    }
}