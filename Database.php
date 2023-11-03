<?php

// Connect to DB, and execute a query

class Database
{
    public $connection; 

    public function __construct($config, $username='root', $password=''){


        // data source name
        $dsn = "mysql:" . http_build_query($config, '', ';'); // host=localhost;port=3306;dbname=myapp;charset=utf8mb4
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params=[])
    {
        $statement = $this->connection->prepare($query);

        $statement->execute($params);

        return $statement;
    }
}

