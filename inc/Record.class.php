<?php
namespace inc;
class Record
{
    private $conn;
    public function __construct(){
        $tmp= new Conn();
        $this->conn =$tmp->conn;
    }

    public function record($tp,$stat,$content){
        $mb = $_SESSION['mobile'];
        $ip = $_SERVER['REMOTE_ADDR'];
        $sql = "insert into hz_record (`mb`,`ip`,`tp`,`stat`,`content`) values(:mb,:ip,:tp,:stat,:content)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':mb'=>$mb,
            ':ip'=>$ip,
            ':tp'=>$tp,
            ':stat'=>$stat,
            ':content'=>$content,
        ]);
    }

    public function get_test_name($id){
        $c_id = substr($id,0,6).'00';
        $c_name = $this->get_chapter_name($c_id);
        return $c_name;
    }

    public function get_info($mb){
        $sql = "select mb,tim,ip,content,tp,stat from hz_record where mb= $mb order by tim";
        $stmt = $this->conn->query($sql);
        if($stmt){
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    public function get_day_rec($mb,$id){
        $sql = "select mb,tim,ip,content,tp,stat from hz_record where mb= '$mb' and mid(tim,6,5)='$id' order by tim";
        $stmt = $this->conn->query($sql);
        if($stmt){
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }


    public function get_ctime($mb){
        $sql = "select `createTime` as c from user where mobile= '$mb'";
        $stmt = $this->conn->query($sql);
        if($stmt){
            $r=$stmt->fetch(\PDO::FETCH_ASSOC);
            return $r['c'];
        }
    }


    public function get_chapter_name($id){
        $sql = "select `name` from books where id = '$id'";
        $stmt = $this->conn->query($sql);
        if($stmt){
            $r = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $r['name'];
        }
    }

    public function get_video_name($id){
        $sql = "select `nam` from hz_videos where cid = '$id'";
        $stmt = $this->conn->query($sql);
        if($stmt){
            $r = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $r['nam'];
        }
    }

}