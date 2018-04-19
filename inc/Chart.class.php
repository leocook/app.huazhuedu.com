<?php
namespace inc;

class Chart
{
    private $conn;
    public function __construct(){
        $tmp= new Conn();
        $this->conn =$tmp->conn;
    }
    public function get_mbadr(){
    $sql ="SELECT city,count(*) FROM v_mbaddr group by city order by count(*) desc limit 11";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $r=$stmt->fetchAll(\PDO::FETCH_NUM);
    return $r;
    }
    public function get_mbaddr_count(){
        $sql ="SELECT count(*) FROM v_mbaddr";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $r=$stmt->fetch(\PDO::FETCH_NUM);
        return $r;
    }

}