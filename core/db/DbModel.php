<?php

namespace nawar\framework\db;

use nawar\framework\Application;
use nawar\framework\Model;

abstract class DbModel extends Model
{
    abstract public function tableName(): string;
    abstract public function attributes(): array;
    abstract public function primaryKey(): string;
    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attribute) => ":$attribute",$attributes);
        $statement = self::prepare("INSERT INTO $tableName 
                    (".implode(",", $attributes).")  
                    VALUES(".implode(",", $params).") ");
        foreach ($attributes as $attribute)
        {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        $statement->execute();
        return true;
    }
    public function findOne($keys)
    {
        $tableName = static::tableName();
        $attributes = array_keys($keys);
        $sql = implode("AND", array_map(fn($attribute) => "$attribute = :$attribute", $attributes));
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach ($keys as $key => $item)
        {
            $statement->bindValue(":$key", $item);
        }
        $statement->execute();
        return $statement->fetchObject(static::class);
    }
    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }
}