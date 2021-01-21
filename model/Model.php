<?php

namespace app\model;
use app\engine\Db;
use app\interfaces\IModel;

abstract class Model implements IModel
{

    abstract public function getTableName();

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function getOne($id)
    {
//        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = :id";
        return Db::getInstance()->queryOneObject($sql, ['id' => $id], get_called_class());
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->getTableName()}";
        return Db::getInstance()->queryAll($sql);
    }

    public function insert() {
        var_dump($this);
        $params = [];
        $columns = "";
        $values = "";

        foreach ($this as $key => $value) {
            if (is_null($value)) continue;
            if (!empty($columns)) {
                $columns = $columns . ", " . "`{$key}`";
            } else {
                $columns = $columns . "`{$key}`";
            }
            if (!empty($values)) {
                $values = $values . ", " . "'{$value}'";
            } else {
                $values = $values . "'{$value}'";
            }

        }
        $sql = "INSERT INTO {$this->getTableName()} ({$columns}) VALUES ({$values})";
        var_dump($sql);
        return Db::getInstance()->execute($sql, $params);
    }


    public function update() {

    }

    public function delete()
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = {$this->id}";
        return Db::getInstance()->execute($sql);
    }
}