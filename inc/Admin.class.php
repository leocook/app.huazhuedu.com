<?php
namespace inc;

class Admin
{
    private $conn;
    public function __construct(){
        $tmp= new Conn();
        $this->conn =$tmp->conn;
    }

    /*
     * 增加订单，默认时间是一天
     */
    public function add_order($mb,$gid,$d=1,$mb_op=''){
        $tim = date("Y-m-d H:i:s");
        $exp = date("Y-m-d H:i:s",time()+3600*24*$d);
        $sql ="insert into orders (mobile,tim,exp,gid,operator) values (:mb,:tim,:exp,:gid,:op)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':mb',$mb);
        $stmt->bindParam(':tim',$tim);
        $stmt->bindParam(':exp',$exp);
        $stmt->bindParam(':gid',$gid);
        $stmt->bindParam(':op',$mb_op);
        $stmt->execute();
        return $stmt->rowCount();
    }

    /*
     * 获取某个用户的全部订单
     */
    public function get_orders($mb){
        $sql ="select a.id,a.gid,a.stat,a.tim,a.exp,b.price,b.des from orders as a,goods as b where a.mobile =:mb and a.gid = b.id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':mb',$mb);
        $stmt->execute();
        $r=$stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $r;
    }

    /*
     * 根据订单ID删除订单
     */
    public function del_order_by_id($id){
        $sql = "delete from orders where id = :id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        return $stmt->rowCount();
    }

    /*
     * 获取大于某个等级的用户
     */
    public function get_operator($lvl){
        $sql ="select a.mobile, a.lastLoginTime,a.lastLoginIp, a.levels,b.name from user as a left join saler as b on a.mobile=b.mobile where a.levels>=:lvl order by a.levels desc";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':lvl',$lvl);
        $stmt->execute();
        $r=$stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $r;
    }

    /*
     * 根据ip得到地址和运营商
     */
    public function addr_from_ip($ip)
    {
        $sql = "SELECT addr,operator FROM bbs_ip WHERE INET_ATON(:ip) BETWEEN INET_ATON(ip_start) AND INET_ATON(ip_end)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':ip', $ip);
        $stmt->execute();
        $r = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $r;
    }

    /*
     * 获取用户的推广数量
     */
    public function get_extends($mb){
        $sql ="select count(*) from user where saler = :mb";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':mb', $mb);
        $stmt->execute();
        $r = $stmt->fetchAll(\PDO::FETCH_NUM);
        return $r;
    }

    /*
     * 更改用户等级
     */
    public function change_user_lvl($mb,$lvl){
        $sql ="update user set levels = :lvl where mobile = :mb";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':mb', $mb);
        $stmt->bindParam(':lvl', $lvl);
        $stmt->execute();
        if($stmt->rowCount()>0){
            return true;
        }
    }

    public function get_week_user(){
        $sql ="select mobile,sign_time,city from v_week_user order by sign_time";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $r = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $r;
    }

    /*
     * 根据手机号取得所在地区
     */
    public function area_from_phone($mb){
        $_mb=substr($mb,0,7);
        $sql ="select province,city,service_provider from mobile where phone = :mb";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':mb', $_mb);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function get_dgt_applies(){
        $sql ="SELECT uname,mobile,idNum,addr,des FROM dgt_apply where stat = 0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function manage_dgt($_mb,$_lvl)
    {
        $sql = "update user set levels = :lvl where mobile = :mb";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':mb', $_mb);
        $stmt->bindParam(':lvl', $_lvl);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $sql_del = "delete from dgt_apply where mobile = :mb";
            $stmt = $this->conn->prepare($sql_del);
            $stmt->bindParam(':mb', $_mb);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            }
    }
    }

    public function get_order_count(){
        $sql = "select count(*) from orders";
        $stmt = $this->conn->query($sql);
        return $stmt->fetch()[0];
    }
    public function get_week_orders(){
        $sql = "SELECT a.id,a.mobile,a.gid,a.tim,b.name from (select * from orders where TO_DAYS(NOW()) - TO_DAYS(tim)<=7 ) as a left join saler as b on a.operator = b.mobile ";
        $stmt = $this->conn->query($sql);
        if($stmt){
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
}