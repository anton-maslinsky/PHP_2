<?php


namespace app\model;

use app\interfaces\IModel;
use app\engine\App;

abstract class Repository implements IModel
{

    public function getLimit($page) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT 0, ?";
        return App::call()->db->queryLimit($sql, $page);
    }

    public function getWhere($field, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}  WHERE {$field} = :value";
        return App::call()->db->queryAll($sql, ['value' => $value]);
    }


    public function getCountWhere($field, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT count(id) as count FROM {$tableName} WHERE {$field} = :value";
        return App::call()->db->queryOne($sql, ['value' => $value])['count'];
    }

    public function getOneWhere($field, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}  WHERE {$field} = :value";
        return App::call()->db->queryOneObject($sql, ['value' => $value], $this->getEntityClass());
    }

    public function getObjectWhere($field, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}  WHERE {$field} = :value ";
        return App::call()->db->queryOneObject($sql, ['value'=> $value], $this->getEntityClass());
    }

    public function getOne($id) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return App::call()->db->queryOneObject($sql, ['id' => $id], $this->getEntityClass());
    }

    public function getAll() {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return App::call()->db->queryAll($sql);
    }

    public function insert(Model $entity) {
        $params = [];
        $columns = [];

        foreach ($entity->props as $key => $value) {
            $params[":{$key}"] = $entity->$key;
            $columns[] = "$key";
        }
        $columns = implode(", ", $columns);
        $values = implode(", ", array_keys($params));
        $tableName = $this->getTableName();

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$values})";

        App::call()->db->execute($sql, $params);

        $entity->id = App::call()->db->lastInsertId();

//        return $this;
    }

    public function update(Model $entity) {
        $params = [];
        $columns = [];
        foreach ($entity->props as $key => $value) {
            if (!$value) continue;
            $params[":{$key}"] = $entity->$key;
            $columns[] .= "`{$key}` = :{$key}";
            $entity->props[$key] = false;
        }
        $columns = implode(", ", $columns);
        $params['id'] = $entity->id;
        $tableName = $this->getTableName();
        $sql = "UPDATE `{$tableName}` SET {$columns} WHERE `id` = :id";
        App::call()->db->execute($sql, $params);

    }

    public function delete(Model $entity) {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return App::call()->db->execute($sql, ['id' => $entity->id]);
    }

    public function save(Model $entity) {
        if (is_null($entity->id)) {
            $this->insert($entity);
        } else {
            $this->update($entity);
        }
    }
    abstract protected function getEntityClass();
    abstract protected function getTableName();

    public function increment($id) {
        $tableName = $this->getTableName();
        $sql = "UPDATE `{$tableName}` SET `qty` = qty + 1 WHERE `id` = :id";
        return App::call()->db->execute($sql, ['id' => $id]);
    }

    public function decrement($id) {
        $tableName = $this->getTableName();
        $sql = "UPDATE `{$tableName}` SET `qty` = qty - 1 WHERE `id` = :id";
        return App::call()->db->execute($sql, ['id' => $id]);
    }

    public function getQty($field, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT `qty` FROM {$tableName}  WHERE {$field} = :value";
        return App::call()->db->queryOneColumn($sql, ['value' => $value]);
    }

}