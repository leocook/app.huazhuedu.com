<?php
namespace inc;
class Survey
{
    private $conn;
    public function __construct(){
        $tmp= new Conn();
        $this->conn =$tmp->conn;
    }
    public function save($ans){
        $sql ="insert into survey (q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,q11,q12,nam,mobile,teacher,company) values (:q1,:q2,:q3,:q4,:q5,:q6,:q7,:q8,:q9,:q10,:q11,:q12,:nam,:mobile,:teacher,:company)";
        $stmt = $this->conn->prepare($sql);
        $r=[];
        foreach ($ans as $k=>$v){
            if(is_string($v)){
                $r[$k]=$v;
            }else{
                $r[$k]=implode('',$v);
            }
        }
        $stmt->bindParam(':q1', $r['q1']);
        $stmt->bindParam(':q2', $r['q2']);
        $stmt->bindParam(':q3', $r['q3']);
        $stmt->bindParam(':q4', $r['q4']);
        $stmt->bindParam(':q5', $r['q5']);
        $stmt->bindParam(':q6', $r['q6']);
        $stmt->bindParam(':q7', $r['q7']);
        $stmt->bindParam(':q8', $r['q8']);
        $stmt->bindParam(':q9', $r['q9']);
        $stmt->bindParam(':q10', $r['q10']);
        $stmt->bindParam(':q11', $r['q11']);
        $stmt->bindParam(':q12', $r['q12']);
        $stmt->bindParam(':nam', $r['name']);
        $stmt->bindParam(':mobile', $r['mobile']);
        $stmt->bindParam(':teacher', $r['teacher']);
        $stmt->bindParam(':company', $r['company']);
        $stmt->execute();
        if($stmt->rowCount()>0){
            return true;
        }
    }

}