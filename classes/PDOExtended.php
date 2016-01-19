<?php
    class PDOExtended extends PDO{
        private $myselhost;
        private $dbname;
        private $myseluser;
        private $mysqlpass;

        public function __construct($mysqlhost, $dbname, $mysqluser, $mysqlpass){
            parent::__construct("mysql:dbname={$dbname};host={$mysqlhost}", $mysqluser, $mysqlpass);
        }

        public function queryInsert($tableName, $insertKey, $insertData, $executeData){
            $prepare = parent::prepare("INSERT INTO {$tableName} ({$insertKey}) VALUES ({$insertData})");

            if($prepare){
                $prepare->execute(
                    $executeData
                );
            }
        }
    }
?>
