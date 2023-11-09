<?php

class Database
{
    public $connection;
    public $statement;
    public $record;

    public function __construct($config, $username = 'root', $password = '')
    {
        // data source name
        $dsn = "mysql:" . http_build_query($config, '', ';'); // host=localhost;port=3306;dbname=myapp;charset=utf8mb4
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);

        $this->statement->execute($params);

        return $this;
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }

    public function find()
    {
        return $this->statement->fetch();
    }
}
