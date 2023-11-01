<?php

// Connect to DB, and execute a query

class Database
{
    public $connection; 

    public function __construct(){
        // data source name
        $dsn = "mysql:host=localhost;port=3306;dbname=myapp;user=root;charset=utf8mb4";
        
        $this->connection = new PDO($dsn);
    }

    public function query($query)
    {
        $statement = $this->connection->prepare($query);

        $statement->execute();

        return $statement;
    }
}

$query = "SELECT * FROM user";
$db = new Database();
$users = $db->query($query)->fetch(PDO::FETCH_ASSOC);


dumpAndDie($users);