<?php

class Database
{
    private $host = 'localhost';
    private $dbName = 'php_rest';
    private $user = 'root';
    private $password = 'Opel120386!';
    private $connection;

    public function connect()
    {
        $this->connection = null;
        $dns = "mysql:host={$this->host};dbname={$this->dbName};charset=UTF8";
        try
        {
            $this->connection = new PDO($dns, $this->user, $this->password);
            
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }

        return $this->connection;
    }
}