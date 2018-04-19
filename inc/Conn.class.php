<?php
namespace inc;
class Conn
{
    private $db_type = 'mysql';
    private $db_host = '127.0.0.1';
    private $db_name = 'app';
    private $db_user = 'root';
    private $db_pwd = 'Mozilla^51zFgHj';
    public $conn;

    public function __construct()
    {
        $dsn = $this->mk_dsn();
        $this->conn = new \PDO($dsn,$this->db_user,$this->db_pwd);
    }
    private function mk_dsn(){
        return "{$this->db_type}:host={$this->db_host};dbname={$this->db_name}";
    }
    public function __destruct()
    {
        $this->conn=null;
    }
}