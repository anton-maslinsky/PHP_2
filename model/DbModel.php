<?php


namespace app\model;


use app\engine\Db;

abstract class DbModel extends Model
{
    abstract public static function getTableName();

//    public static function getLimit($page) {
//        $tableName = static::getTableName();
//        $sql = "SELECT * FROM {$tableName} LIMIT 0, ?";
//        return Db::getInstance()->queryLimit($sql);
//
//    }

    public static function getWhere($field, $value) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}  WHERE {$field} = :value";
        return Db::getInstance()->queryAll($sql, ['value' => $value]);
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

    public static function getBasket() {
        $session_id = 1; // временное значение для проверки
        $sql = "SELECT * FROM products AS p JOIN basket AS c ON p.id = c.product_id WHERE c.session_id = :session_id";
        return Db::getInstance()->queryAll($sql, ['session_id' => $session_id]);
    }

    public function insert() {
        $params = [];
        $columns = [];

        foreach ($this as $key => $value) {
            if ($key == 'id') continue;
            $params[":{$key}"] = $value;
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

    public function update($fieldName, $value) {

        $tableName = static::getTableName();

        $sql = "UPDATE {$tableName} SET {$fieldName} = '{$value}' WHERE id = :id";

        Db::getInstance()->execute($sql, ['id' => $this->id]);
        $this->id = Db::getInstance()->lastInsertId();

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