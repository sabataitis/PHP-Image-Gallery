<?php

namespace Core\Database;

class QueryBuilder
{
    protected $pdo;
    protected $query;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    public function query($sql){
        try{
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
            return $statement->fetchAll(\PDO::FETCH_OBJ);
        }
        catch(PDOException $exception){
           header("Location: /");
        }
    }
    public function select($column, $table){
            $this->query = "SELECT {$column} from {$table}";
            return $this;
    }
    public function where($column, $value){
        $this->query.=" WHERE {$column}={$value}";
        return $this;
    }
    public function andWhere($column, $value){
        $this->query.=" AND {$column}={$value}";
        return $this;
    }
    public function get(){
        try{
            $statement = $this->pdo->prepare($this->query);
            $statement->execute();
            return $statement->fetchAll(\PDO::FETCH_OBJ);
        }
        catch(\PDOException $exception){
            throw $exception;
        }
    }
    public function insert($parameters, $table) {
        try{
            $sql = sprintf(
                'insert into %s (%s) values (%s)',
                $table,
                implode(', ', array_keys($parameters)),
                ':'.implode(', :',array_keys($parameters))
            );
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        }
        catch(\PDOException $exception){
            header("Location: /");
        }
    }
    public function update($table, $set_field, $set_value, $where_field, $where_value){
       try{
           $sql = "update `{$table}` set `{$set_field}`='{$set_value}' where `{$where_field}`='{$where_value}'";
           $statement = $this->pdo->prepare($sql);
           $statement->execute();
       }
       catch(\Exception $exception){
           die($exception);
       }
    }
}
