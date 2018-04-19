<?php
namespace inc;

class Video
{
    private $conn;

    public function __construct(){
        $tmp= new Conn();
        $this->conn =$tmp->conn;
    }

    public function get_video_info($id){
        $sql = "select id,path from hz_videos where cid = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        $r=$stmt->fetch(\PDO::FETCH_ASSOC);
        return $r;
    }

    public function get_video_nam($id){
        $sql = "select 'name' from hz_course where bone_id = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        $r=$stmt->fetch(\PDO::FETCH_ASSOC);
        return $r['name'];
    }

    public function get_video_list($pro_id = '01', $sub_id = '01', $course_id = '01', $qlist = '01')
    {
        if($qlist==='00'){
            $reg = "$pro_id$sub_id$course_id..";
        }else if($course_id==='00'){
            $reg = "$pro_id$sub_id....";
        }else if($sub_id ==='00'){
            $reg = "$pro_id......";
        }else if($pro_id==='00'){
            $reg = "........";
        }
        else{
            $reg = "$pro_id$sub_id$course_id$qlist";
        }
        $sql = 'select id,name,img,view_count from hz_course where bone_id REGEXP :reg';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":reg",$reg);
        $stmt->execute();
        $r=$stmt->fetch(\PDO::FETCH_ASSOC);
        return $r;
    }

    public static function update_view_count($id)
    {
        $sql = 'update hz_course set  view_count = view_count+1 where id = :id';
        Db::execute($sql,['id'=>$id]);
    }

    public  function get_videos($id)
    {
        $sql = 'select id,nam,cid from hz_videos where course_id = :id order by cid';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        $qs=$stmt->fetchAll(\PDO::FETCH_ASSOC);
        if($qs){
            $c=[];
            foreach ($qs as $l) {
                if (substr($l['cid'], 2, 6) === '000000') {
                    $c['b_name'] = $l['nam'];
                } else if (substr($l['cid'], 4, 4) === '0000') {
                    $c['s_name'] = $l['nam'];
                } else{
                    $c['list'][]= ['id'=>$l['cid'],'name'=>$l['nam']];
                }
            }
            return $c;
        }
    }


}