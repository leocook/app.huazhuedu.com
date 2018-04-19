<?php

namespace inc;
class User
{
    private $conn;

    public function __construct()
    {
        $tmp = new Conn();
        $this->conn = $tmp->conn;
    }

    public function login($mb, $pwd, $sid)
    {
        $pass = md5($pwd, false);
        $sql = "call login_new(:mb,:pass,:sid,@ls,@r)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":mb", $mb);
        $stmt->bindParam(":pass", $pass);
        $stmt->bindParam(":sid", $sid);
        if ($stmt->execute()) {
            $st = $this->conn->query("select @ls,@r");
            if (!$st) {
                exit('获取数据失败');
            }
            $r = $st->fetch(\PDO::FETCH_ASSOC);
            if ($r["@r"] === '1' && $this->update_access_param($mb)) {
                $_SESSION["login"] = true;
                $_SESSION["mobile"] = $mb;
                $_SESSION["lvl"] = intval($r["@ls"]);
                $_SESSION["priv"] = $this->get_priv($mb);
                setcookie(session_name(), session_id(), time() + 3600 * 4, "/");
                return true;
            }else{
                $this->logout();
            }
        }
    }

    /*
     * 和登录函数一个功能，因为pdo预处理语句顺序不确定，导致update_access_param失败，故有此函数
     */

    public function sign_login($mb, $pwd, $sid){
        $pass = md5($pwd, false);
        $sql = "call login_new(:mb,:pass,:sid,@ls,@r)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":mb", $mb);
        $stmt->bindParam(":pass", $pass);
        $stmt->bindParam(":sid", $sid);
        if ($stmt->execute()) {
            $st = $this->conn->query("select @ls,@r");
            if (!$st) {
                exit('获取数据失败');
            }
            $r = $st->fetch(\PDO::FETCH_ASSOC);
            if ($r["@r"] === '1') {
                $_SESSION["login"] = true;
                $_SESSION["mobile"] = $mb;
                $_SESSION["lvl"] = intval($r["@ls"]);
                $_SESSION["priv"] = $this->get_priv($mb);
                setcookie(session_name(), session_id(), time() + 3600 * 4, "/");
                return true;
            }else{
                $this->logout();
            }
        }
    }

    public function logout()
    {
        setcookie(session_name(), null, time() - 1000, "/");
        session_unset();
        session_destroy();
    }

    public function sign($mb, $pass,$saler,$lvl){
            $pwd = md5($pass,false);
            $ctime = $atime = date("Y-m-d H-i-s");
            $cip = $aip= $_SERVER["REMOTE_ADDR"];
            $sql = "call insert_user(:mb,:pwd,:ctime,:cip,:atime,:aip,:saler,:levels,@n)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":mb", $mb);
            $stmt->bindParam(":pwd", $pwd);
            $stmt->bindParam(":ctime", $ctime);
            $stmt->bindParam(":cip", $cip);
            $stmt->bindParam(":atime", $atime);
            $stmt->bindParam(":aip", $aip);
            $stmt->bindParam(":saler", $saler);
            $stmt->bindParam(":levels", $lvl);
            if($stmt->execute()){
                if((bool)$this->conn->query("select @n")->fetch(\PDO::FETCH_ASSOC)["@n"]){
                    return true;
                }
            }
    }

    public function change_pwd($mb,$pwd){
        $sql = "update user set pwd = :pwd where mobile = :mb";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":mb", $mb);
        $stmt->bindParam(":pwd", $pwd);
        $stmt->execute();
        $r=$stmt->rowCount();
        return (bool)$r;
    }

//----------------------------私有方法-------------------------------------------------------
    private function update_access_param($mb)
    {
        $tim = date("Y-m-d H:i-s");
        $ip = $_SERVER["REMOTE_ADDR"];
        $sql = "update user set lastLoginIp =:ip,LastloginTime =:tim where mobile = :mb";
        $stmp = $this->conn->prepare($sql);
        $stmp->bindParam(":ip", $ip);
        $stmp->bindParam(":tim", $tim);
        $stmp->bindParam(":mb", $mb);
        if ($stmp->execute() && $stmp->rowCount() > 0) {
            return true;
        }
        return false;
    }

    private function get_priv($mb)
    {
        $sql = "select b.content from orders as a,goods as b where a.mobile =:mb and a.gid=b.id and a.stat =1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":mb", $mb);
        if ($stmt->execute()) {
            return $this->remove_dup($stmt->fetchAll(\PDO::FETCH_NUM));
        }
    }

    private function remove_dup($arr)
    {
        if (count($arr) == 0) {
            return "";
        }
        $str = "";
        foreach ($arr as $i) {
            $str = $str . $i[0];
        }
        $arr_str = [];
        for ($j = 0; $j < strlen($str); $j++) {
            $arr_str[] = $str[$j];
        }
        $new_arr = array_flip(array_flip($arr_str));
        return implode('', $new_arr);
    }
}