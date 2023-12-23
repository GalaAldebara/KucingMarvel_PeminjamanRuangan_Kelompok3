<?php

class Connection
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "mufid";
    public $koneksi;

    function __construct()
    {
        $this->connect();
    }

    function connect()
    {
        $conn = mysqli_connect($this->host, $this->user, $this->password, $this->dbname);
        $this->koneksi = $conn;
    }
}
