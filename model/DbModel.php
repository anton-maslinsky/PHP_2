<?php


namespace app\model;


use app\engine\Db;

abstract class DbModel extends Model
{
    abstract public static function getTableName();

    public static function getLimit($page) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT 0, ?";
        return Db::getInstance()->queryLimit($sql, $page);
    }

    public static function getWhere($field, $value) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}  WHERE {$field} = :value";
        return Db::getInstance()->queryAll($sql, ['value' => $value]);
    }

    public static function getCountWhere($field, $value) {
        $tableName = static::getTableName();
        $sql = "SELECT count(id) as count FROM {$tableName} WHERE {$field} = :value";
        return Db::getInstance()->queryOne($sql, ['value' => $value])['count'];
    }

    public static function getOneWhere($field, $value) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}  WHERE {$field} = :value";
        return Db::getInstance()->queryOneObject($sql, ['value' => $value], static::class);
    }

    public static function getObjectWhere($field, $value)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}  WHERE {$field} = :value ";
        return Db::getInstance()->queryOneObject($sql, ['value'=> $value], static::class);
    }

    public static function getOne($id) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryOneObject($sql, ['id' => $id], static::class);
    }

    public static function getAll() {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

    public function insert() {
        $params = [];
        $columns = [];

        foreach ($this->props as $key => $value) {
            $params[":{$key}"] = $this->$key;
            $columns[] = "$key";
        }
        $columns = implode(", ", $columns);
        $values = implode(", ", array_keys($params));
        $tableName = static::getTableName();

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$values})";

        Db::getInstance()->execute($sql, $params);

        $this->id = Db::getInstance()->lastInsertId();

        return $this;
    }

    public function update() {
        $params = [];
        $columns = [];
        foreach ($this->props as $key => $value) {
            if (!$value) continue;
            $params[":{$key}"] = $this->$key;
            $columns[] .= "`{$key}` = :{$key}";
            $this->props[$key] = false;
        }
        $columns = implode(", ", $columns);
        $params['id'] = $this->id;
        $tableName = static::getTableName();
        $sql = "UPDATE `{$tableName}` SET {$columns} WHERE `id` = :id";
        Db::getInstance()->execute($sql, $params);
        return $this;
    }

    public function delete() {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->execute($sql, ['id' => $this->id]);
    }

    public function save() {
        if (is_null($this->id)) {
            $this->insert();
        } else {
            $this->update();
        }
    }
}