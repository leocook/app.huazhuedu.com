<?php
namespace inc;
class Exam
{
    private $conn;
    public function __construct(){
        $tmp= new Conn();
        $this->conn =$tmp->conn;
    }

    /*
     * 通过考卷编号，获取考题编号和题型分数；
     * param:id 固定试卷的编号
     * 返回：成功 返回题目id 失败 返回 null;
     */
    public function get_qid($id){
        $id_sql ="select nam,sc_que,sc_score,mc_que,mc_score,tf_que,tf_score from exam where id = :id";
        $stmt = $this->conn->prepare($id_sql);
        if ($stmt->execute(['id'=>$id])) {
            return $stmt->fetch(\PDO::FETCH_ASSOC);
            }
    }

    /*
     *通过考题获取题目,返回关联数组
     */
    public function get_assoc_questions($str){
        $qs_sql ="select id,qType,question,qSelect,qAnswer,qImg from questions where id in ($str)";
        $stmt=$this->conn->prepare($qs_sql);
        if ($stmt->execute()) {
            return $stmt->fetchall(\PDO::FETCH_ASSOC);
        }
    }

    /*从配置文件，生成一套随机考试试卷*/
    public function rnd_exam($p){
        $sc= $this->get_rnd($p['questions'],1,'sc');
        $mc = $this->get_rnd($p['questions'],2,'mc');
        $tf = $this->get_rnd($p['questions'],3,'tf');
        return ['sc_que'=>$sc,'mc_que'=>$mc,'tf_que'=>$tf,'score'=>$p['score'],'nam'=>$p['nam']];
    }
    /*
     * 通过考题获取题目,返回数组
     */
    public function get_num_questions($str){
        $qs_sql ="select id,qType,question,qSelect,qAnswer,qImg from questions where id in ($str)";
        $stmt=$this->conn->prepare($qs_sql);
        if ($stmt->execute()) {
            return $stmt->fetchall(\PDO::FETCH_NUM);
        }
    }

    /*随机考试的出题方案*/
    public function rnd_param($bid){
        switch ($bid){
            case '01':
                $result = [
                    'questions'=>[
                        ['cid'=>'010101','sc'=>6,'mc'=>0,'tf'=>2],
                        ['cid'=>'010102','sc'=>14,'mc'=>0,'tf'=>6],
                        ['cid'=>'010103','sc'=>4,'mc'=>0,'tf'=>2],
                        ['cid'=>'010104','sc'=>3,'mc'=>0,'tf'=>2],
                        ['cid'=>'010105','sc'=>3,'mc'=>0,'tf'=>2],
                        ['cid'=>'010106','sc'=>10,'mc'=>0,'tf'=>5],
                        ['cid'=>'010107','sc'=>2,'mc'=>0,'tf'=>1],
                        ['cid'=>'010108','sc'=>2,'mc'=>0,'tf'=>1],
                        ['cid'=>'010109','sc'=>2,'mc'=>0,'tf'=>1],
                        ['cid'=>'010110','sc'=>6,'mc'=>0,'tf'=>4],
                        ['cid'=>'010111','sc'=>3,'mc'=>0,'tf'=>2],
                        ['cid'=>'010201','sc'=>22,'mc'=>1,'tf'=>16],
                        ['cid'=>'010202','sc'=>17,'mc'=>9,'tf'=>13],
                        ['cid'=>'010203','sc'=>6,'mc'=>30,'tf'=>3]],
                    'score'=>['sc'=>0.5,'mc'=>0.5,'tf'=>0.5],
                    'nam'=>'初级消防员随机考场'
                ];
                break;
            case '03':
                $result = [
                    'questions'=>[
                        ['cid'=>'030101','sc'=>6,'mc'=>0,'tf'=>2],
                        ['cid'=>'030102','sc'=>14,'mc'=>0,'tf'=>6],
                        ['cid'=>'030103','sc'=>4,'mc'=>0,'tf'=>2],
                        ['cid'=>'030104','sc'=>3,'mc'=>0,'tf'=>2],
                        ['cid'=>'030105','sc'=>3,'mc'=>0,'tf'=>2],
                        ['cid'=>'030106','sc'=>10,'mc'=>0,'tf'=>5],
                        ['cid'=>'030107','sc'=>2,'mc'=>0,'tf'=>1],
                        ['cid'=>'030108','sc'=>2,'mc'=>0,'tf'=>1],
                        ['cid'=>'030109','sc'=>2,'mc'=>0,'tf'=>1],
                        ['cid'=>'030110','sc'=>6,'mc'=>0,'tf'=>4],
                        ['cid'=>'030111','sc'=>3,'mc'=>0,'tf'=>2],
                        ['cid'=>'030201','sc'=>22,'mc'=>1,'tf'=>16],
                        ['cid'=>'030202','sc'=>17,'mc'=>9,'tf'=>13],
                        ['cid'=>'030203','sc'=>6,'mc'=>30,'tf'=>3]],
                    'score'=>['sc'=>0.5,'mc'=>0.5,'tf'=>0.5],
                    'nam'=>'中级消防员随机考场'
                ];
                break;
            default:
                $result = [
                    'questions'=>[
                        ['cid'=>'010101','sc'=>6,'mc'=>0,'tf'=>2],
                        ['cid'=>'010102','sc'=>14,'mc'=>0,'tf'=>6],
                        ['cid'=>'010103','sc'=>4,'mc'=>0,'tf'=>2],
                        ['cid'=>'010104','sc'=>3,'mc'=>0,'tf'=>2],
                        ['cid'=>'010105','sc'=>3,'mc'=>0,'tf'=>2],
                        ['cid'=>'010106','sc'=>10,'mc'=>0,'tf'=>5],
                        ['cid'=>'010107','sc'=>2,'mc'=>0,'tf'=>1],
                        ['cid'=>'010108','sc'=>2,'mc'=>0,'tf'=>1],
                        ['cid'=>'010109','sc'=>2,'mc'=>0,'tf'=>1],
                        ['cid'=>'010110','sc'=>6,'mc'=>0,'tf'=>4],
                        ['cid'=>'010111','sc'=>3,'mc'=>0,'tf'=>2],
                        ['cid'=>'010201','sc'=>22,'mc'=>1,'tf'=>16],
                        ['cid'=>'010202','sc'=>17,'mc'=>9,'tf'=>13],
                        ['cid'=>'010203','sc'=>6,'mc'=>30,'tf'=>3]],
                    'score'=>['sc'=>0.5,'mc'=>0.5,'tf'=>0.5],
                    'nam'=>'初级消防员随机考场'
                ];
        }
        return $result;
    }


    /*bone_id前4位，指示该真题属于的书籍*/
    public function get_real_que_list($id){
        $sql = "select id,nam,star,view_count from hz_paper where left(bone_id,4)=:id ";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute(['id'=>$id])) {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    public function get_real_que($paper_id){
        $sql = "select id,qType,question,qSelect,qAnswer,qDescribe,paper_id,qImg from hz_questions where paper_id = :id";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute(['id'=>$paper_id])) {
            return $stmt->fetchAll(\PDO::FETCH_NUM);
        }
    }

    function get_exam_schema($id){
        $sql ="select * from examrnd where id = :id";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute(['id'=>$id])) {
            $r= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $r[0];
        }
    }

    public function get_real_type_ques($paper_id,$tp){
        $sql = "select id,qType,question,qSelect,qAnswer,qImg from hz_questions where paper_id = :id and qType = :tp";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute(['id'=>$paper_id,'tp'=>$tp])) {
            return $stmt->fetchAll(\PDO::FETCH_NUM);
        }
    }

    /*-------------------------------------------------------------------------------*/

    /*获取随机考试的各种题目*/
    private function get_rnd($ps,$type,$nam){
        $sql_array=[];
        foreach($ps as $p){
            $sql_array[]="select * from (select id,qType,question,qSelect,qAnswer,qImg from questions where cid = {$p['cid']} and qType= {$type} ORDER BY rand() limit {$p[$nam]}) as t{$p['cid']}";
        }
        $sql = implode(' union ',$sql_array);
        $stmt=$this->conn->prepare($sql);
        if ($stmt->execute()) {
            $tmp = $stmt->fetchall(\PDO::FETCH_NUM);
            return $tmp;
        }
    }
}