<?php
    class PDOC extends PDO{
        private $mysqlhost;
        private $dbname;
        private $myseluser;
        private $mysqlpass;

        public function __construct($mysqlhost, $dbname, $mysqluser, $mysqlpass){
            try{
                parent::__construct("mysql:dbname={$dbname};host={$mysqlhost}", $mysqluser, $mysqlpass);
                $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                throw new PDOException($e->getMessage());
            }
        }

        public function queryInsert($tableName, $insertKey, $insertData, $executeData){
            $prepare = parent::prepare("INSERT INTO {$tableName} ({$insertKey}) VALUES ({$insertData})");

            try{
                $prepare->execute(
                    $executeData
                );
            }catch(PDOException $e){
                throw new PDOException($e->getMessage());
            }
        }

        public function queryUpdate($tableName, $insertData, $executeData, $insertWhereKey, $insertWhereValue){
            $prepare = parent::prepare("UPDATE {$tableName} SET {$insertData} WHERE {$insertWhereKey} = {$insertWhereValue}");

            try{
                $prepare->execute(
                    $executeData
                );
            }catch(PDOException $e){
                throw new PDOException($e->getMessage());
            }
        }

        public function queryDelete($tableName, $deleteWhereKey, $deleteWhereValue){
            $prepare = parent::prepare("DELETE FROM {$tableName} WHERE {$deleteWhereKey} = {$deleteWhereValue}");

            try{
                $prepare->execute();
            }catch(PDOException $e){
                throw new PDOException($e->getMessage());
            }
        }

        public function querySelect($tableName, $selectData, $sellectWhereKey = null, $selectWhereValue = null, $orderByKey = null, $orderByValue = null){
            if(isset($selectWhereKey, $selectWhereValue)){
                $prepare = parent::prepare("SELECT {$selectData} FROM {$tableName} WHERE $insertWhere");
            }
            elseif(isset($orderByKey, $orderByValue)){
                $prepare = parent::prepare("SELECT {$selectData} FROM {$tableName} ORDER BY {$orderByKey} {$orderByValue}");
            }
            elseif(isset($selectWhereKey, $selectWhereValue, $orderByKey, $orderByValue)){
                $prepare = parent::prepare("SELECT {$selectData} FROM {$tableName} WHERE {$selectWhereKey} = {$selectWhereValue} ORDER BY {$orderByKey} {$orderByValue}");
            }
            else{
                $prepare = parent::prepare("SELECT {$selectData} FROM {$tableName}");
            }

            try{
                $prepare->execute();
            }catch(PDOException $e){
                throw new PDOException($e->getMessage());
            }
        }
    }
?>
