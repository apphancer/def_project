<?php

namespace App;

use Controller\Controller;
use PDO;
use function var_dump;

include('Controller.php');

class App
{
    private $db;

    public function __construct($config) {
        $this->setDb($this->db_connection($config));
        $this->db = $this->getDb();
    }

    public function createWebApp($config)
    {
        $controller = new Controller($config);
        $controller->getPage($_SERVER["REQUEST_URI"], $config);
    }

    public function db_connection($config)
    {
        $dsn = sprintf('mysql:host=%s;dbname=%s;charset=%s', $config['db']['host'], $config['db']['name'], $config['db']['charset']);
        return new PDO($dsn, $config['db']['user'], $config['db']['password']);
    }

    /**
     * @return mixed
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param mixed $db
     */
    public function setDb($db)
    {
        $this->db = $db;
    }


}