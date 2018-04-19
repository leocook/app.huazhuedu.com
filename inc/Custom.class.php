<?php
namespace inc;

class Custom
{
    private $conn;
    public function __construct(){
        $tmp= new Conn();
        $this->conn =$tmp->conn;
    }

    /*获取开班信息*/
    public function get_school_info(){
        $sql = "select id,nam,`count` from hz_class order by start desc";
        $stmt = $this->conn->query($sql);
        if($stmt){
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

    }


    /*获取大概的开班信息，供一般用户查看*/
    public function get_totle_school_info(){
        $sql = "select id,nam,is_closed,start,end,addr,des from hz_class order by des";
        $stmt = $this->conn->query($sql);
        if($stmt){
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

    }

    public function get_class_info($id){
        $sql = "select id,nam,`count`,`start`,`end`,addr,des from hz_class where id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id'=>$id]);
        if($stmt->rowCount()>0){
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }

    }


    public function get_reg_count($cid){
        $sql = "select count(*) as c from hz_class_info where class_id = :cid";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':cid'=>$cid]);
        $r = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $r['c'];
    }

    public function get_reg_pass($cid){
        $sql = "select count(*) as c from hz_class_info where class_id = :cid and pass_stat = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':cid'=>$cid]);
        $r = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $r['c'];
    }

    public function get_reg_pay($cid){
        $sql = "select count(*) as c from hz_class_info where class_id = :cid and pay_stat = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':cid'=>$cid]);
        $r = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $r['c'];
    }

    public function reg_in_class($uid,$cid,$need_eat,$need_room,$room_type,$in_man,$in_ip,$id_num,$stu_nam,$c_nam){
        $sql = "insert into hz_class_info (student_id,class_id,need_eat,need_room,room_type,in_man,in_ip,id_num,student_name,class_name) values (:uid,:cid,:need_eat,:need_room,:room_type,:in_man,:in_ip,:id_num,:stu_nam,:c_nam)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':uid'=>$uid,
            ':cid'=>$cid,
            ':need_eat'=>$need_eat,
            ':need_room'=>$need_room,
            ':room_type'=>$room_type,
            ':in_man'=>$in_man,
            ':in_ip'=>$in_ip,
            ':id_num'=>$id_num,
            ':stu_nam'=>$stu_nam,
            ':c_nam'=>$c_nam,
        ]);
        if($stmt->rowCount()>0){
            return true;
        }
    }


    public function in_cust($nam,$id_num,$mb,$tel,$company,$des,$in_man,$in_ip){
        $sql = "insert into hz_custom (nam,id_num,mb,tel,company,des,in_man,in_ip) values (:nam,:id_num,:mb,:tel,:company,:des,:in_man,:in_ip)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':nam'=>$nam,
            ':id_num'=>$id_num,
            ':mb'=>$mb,
            ':tel'=>$tel,
            ':company'=>$company,
            ':des'=>$des,
            ':in_man'=>$in_man,
            ':in_ip'=>$in_ip,
        ]);
        if($stmt->rowCount()>0){
            return true;
        }
    }

    public function update_cust($nam,$id_num,$mb,$tel,$company,$des,$in_man,$in_ip,$uid){
        $sql = "update hz_custom set nam = :nam,id_num = :id_num,mb = :mb,tel = :tel,company = :company,des = :des,in_man = :in_man , in_ip = :in_ip where id = :uid";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':nam'=>$nam,
            ':id_num'=>$id_num,
            ':mb'=>$mb,
            ':tel'=>$tel,
            ':company'=>$company,
            ':des'=>$des,
            ':in_man'=>$in_man,
            ':in_ip'=>$in_ip,
            ':uid'=>$uid,
        ]);
        if($stmt->rowCount()>0){
            return true;
        }
    }

    public function update_class($nam,$count,$start,$end,$is_closed,$addr,$des,$m_ip,$m_man,$cid){
        $sql = "update  hz_class set `nam`=:nam,`count`=:cnt,`start`=:start,`end`=:ed,`is_closed`=:is_closed,`addr`=:addr,`des`=:des,`m_ip`=:m_ip,`m_man`=:m_man,`m_time`=:m_time where id=:cid";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':nam'=>$nam,
            ':cnt'=>$count,
            ':start'=>$start,
            ':ed'=>$end,
            ':is_closed'=>$is_closed,
            ':addr'=>$addr,
            ':des'=>$des,
            ':m_ip'=>$m_ip,
            ':m_man'=>$m_man,
            ':m_time'=>date('Y-m-d H-i-s'),
            ':cid'=>$cid
        ]);
        if($stmt->rowCount()>0){
            return true;
        }
    }

    public function del_class($cid){
        $sql = "delete from hz_class where id=:cid";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':cid'=>$cid
        ]);
        if($stmt->rowCount()>0){
            return true;
        }
    }



    public function in_class($nam,$count,$start,$end,$is_closed,$addr,$des,$in_ip,$in_man){
        $sql = "insert into hz_class (`nam`,`count`,`start`,`end`,`is_closed`,`addr`,`des`,`in_ip`,`in_man`) values (:nam,:cnt,:start,:ed,:is_closed,:addr,:des,:in_ip,:in_man)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':nam'=>$nam,
            ':cnt'=>$count,
            ':start'=>$start,
            ':ed'=>$end,
            ':is_closed'=>$is_closed,
            ':addr'=>$addr,
            ':des'=>$des,
            ':in_ip'=>$in_ip,
            ':in_man'=>$in_man,
        ]);
        if($stmt->rowCount()>0){
            return true;
        }
    }






    /*判断该销售录入的客户是否在客户表里面，并且录入员是该销售*/
    public function is_custom_reg($id,$mb){
        $sql = "select id from hz_custom where id_num = $id and in_man = $mb";
        $stmt = $this->conn->query($sql);
        if($stmt){
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }
    }

    /*获取自己录入的客户信息*/
    public function get_customs($mb){
        $sql = "select a.id,a.nam,a.id_num,a.mb,a.tel,a.company,a.des,b.class_id,b.class_name,b.pay_stat,b.pass_stat  from hz_custom as a left join hz_class_info as b on a.id = b.student_id where a.in_man = $mb";
        $stmt = $this->conn->query($sql);
        if($stmt){
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    public function get_custom_info($id){
        $sql = "select id,nam,id_num,mb,tel,company,des from hz_custom where id = $id";
        $stmt = $this->conn->query($sql);
        if($stmt){
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }
    }

    /*获取自己录入的客户信息*/
    public function is_custom_belong($id,$mb){
        $sql = "select id from hz_custom where id= $id and in_man = $mb";
        $stmt = $this->conn->query($sql);
        if($stmt){
            return (bool)$stmt->fetchAll();
        }
    }
    public function is_class_exist($id){
        $sql = "select id from hz_class where id= $id";
        $stmt = $this->conn->query($sql);
        if($stmt){
            return (bool)$stmt->fetchAll();
        }
    }

    public function is_custom_exist($id){
        $sql = "select id from hz_custom where id= $id";
        $stmt = $this->conn->query($sql);
        if($stmt){
            return (bool)$stmt->fetchAll();
        }
    }

    public function get_viable_class(){
        $sql = "select id,nam,`start`,`end`,`count` from hz_class where is_closed= 0";
        $stmt = $this->conn->query($sql);
        if($stmt){
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    public function is_cust_in_class($id_num,$sid){
        $sql = "select id from hz_class_info where id_num = '$id_num' or student_id = '$sid'";
        $stmt = $this->conn->query($sql);
        if($stmt){
            return $stmt->fetch();
        }
    }

    public function get_cust_id_num($id){
        $sql = "select id_num from hz_custom where id = $id";
        $stmt = $this->conn->query($sql);
        if($stmt){
            $r= $stmt->fetch(\PDO::FETCH_ASSOC);
            return $r['id_num'];
        }
    }

    public function get_class_name($cid){
        $sql = "select nam from hz_class where id = $cid";
        $stmt = $this->conn->query($sql);
        if($stmt){
            $r= $stmt->fetch(\PDO::FETCH_ASSOC);
            return $r['nam'];
        }
    }
    public function get_class_count($cid){
        $sql = "select `count` from hz_class where id = $cid";
        $stmt = $this->conn->query($sql);
        if($stmt){
            $r= $stmt->fetch(\PDO::FETCH_ASSOC);
            return $r['count'];
        }
    }

    public function get_all_customs(){
        $sql = "select student_id,class_id,student_name,pay_stat,pass_stat from hz_class_info";
        $stmt = $this->conn->query($sql);
        if($stmt){
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    public function is_custom_in_class($id){
        $sql = "select id from hz_class_info where student_id = $id";
        $stmt = $this->conn->query($sql);
        if($stmt){
            return $stmt->fetch();
        }
    }

    public function is_class_closed($cid){
        $sql = "select is_closed from hz_class where id = $cid";
        $stmt = $this->conn->query($sql);
        if($stmt){
            $r= $stmt->fetch(\PDO::FETCH_ASSOC);
            return (bool)$r['is_closed'];
        }
    }


    public function is_full($cid){
        $totle = $this->get_class_count($cid);
        $pass = $this->get_reg_pass($cid);
        if(intval($totle)<=intval($pass)){
            return true;
        }
    }

    public function is_reg_full($cid){
        $totle = $this->get_class_count($cid);
        $reg = $this->get_reg_count($cid);
        if(intval($totle)<=intval($reg)){
            return true;
        }
    }


    public function update_cust_pay_stat($id){
        $sql = "update hz_class_info set pay_stat = 1 where student_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id'=>$id]);
        if($stmt->rowCount()>0){
            return true;
        }
    }

    public function update_cust_pass_stat($id){
        $sql = "update hz_class_info set pass_stat = 1 where student_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id'=>$id]);
        if($stmt->rowCount()>0){
            return true;
        }
    }

    public function update_cust_class($id,$cid){
        $sql = "update hz_class_info set class_id = :cid where student_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id'=>$id,':cid'=>$cid]);
        if($stmt->rowCount()>0){
            return true;
        }
    }
    public function del_cust_class($id){
        $sql = "delete from  hz_class_info where student_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id'=>$id]);
        if($stmt->rowCount()>0){
            return true;
        }
    }
}