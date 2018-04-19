<?php
namespace inc;
class Vali
{
    private $conn;
    public function __construct(){
        $tmp= new Conn();
        $this->conn =$tmp->conn;
    }
    /*
     * 页面验证是否登录,不成功就跳转到登录页面
     */
    public  function check_login($mb,$sid){
        if(!$_SESSION["login"] or !$this->_is_sid_login($mb,$sid)){
            self::logout();
            header("Location: login_page.php");
            exit(0);
        }
    }
    public  function check_buy($priv){
        if(strpos($_SESSION["priv"],$priv)===false) {
            header("Content-Type: text/html;charset=utf-8");
            echo "<script>alert('此功能需要开通理论学习套餐');window.location.href='buy.php';</script>";
            exit(0);
        }
    }



    /*
     * ajax判断是否登录，用在ajax请求之前判断用户是否登录
     */
    public function ajax_check_login($mb,$sid){
        if(!$_SESSION["login"] or !$this->_is_sid_login($mb,$sid)){
            self::logout();
            echo json_encode(['status'=>'no','msg'=>'您还没有登录!','errcode'=>1]);
            exit(0);
        }
    }

    public function ajax_ck_login($mb,$sid){
        if($_SESSION["login"] and $this->_is_sid_login($mb,$sid)){
            return true;
        }
    }

    public function ajax_has_priv($id){
        if(strpos($_SESSION["priv"],$id)!==false) {
          return true;
        }
    }

    public function check_lvl($lvl){
        if(intval($_SESSION['lvl'])>$lvl){
            return true;
        }
    }

    public function check_finance(){
        $lvl = intval($_SESSION['lvl']);
        if($lvl>=65 and $lvl<70){
            return true;
        }
    }

    public function check_operator(){
        $lvl = intval($_SESSION['lvl']);
        if($lvl>=70 and $lvl<75){
            return true;
        }
    }
    public function check_admin(){
        $lvl = intval($_SESSION['lvl']);
        if($lvl>90){
            return true;
        }
    }

    public function check_op(){
        if(intval($_SESSION['lvl']) < 80 and intval($_SESSION['lvl'])>70 ){
            return true;
        }
    }
    /*
     * 在用户表搜索手机号来确定是否注册过
     */
    public function is_singed($mb){
        $sql = "select mobile from user where mobile = :mb";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':mb',$mb);
        $stmt->execute();
        $r=$stmt->rowCount();
        return (bool)$r;
    }
    public function is_real_paper_exist($id){
        $sql = "select count(*) as c from hz_paper where id = :id";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute(['id'=>$id])) {
            $r = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $r['c'];
        }
    }

    /*
     * 设置cookie过期，并销毁服务端session,登出系统
     */
    public static function logout(){
        setcookie(session_name(),null,time()-1000,"/");
        session_unset();
        session_destroy();
    }



    //-----------------------------私有方法-----------------------------------

    /*
     * 判断sid是否登录
     */
    private function _is_sid_login($mb,$sid){
        $sql = "select check_login(:mb,:sid)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":mb",$mb);
        $stmt->bindParam(":sid",$sid);
        $stmt->execute();
        $r=$stmt->fetch(\PDO::FETCH_NUM);
        return (bool)$r[0];
    }

    //------------------------静态方法--------------------------------

    public static function filter_mobile($str=''){
        if (preg_match('/^0?(13|14|15|16|17|18|19)[0-9]{9}$/', $str, $matches)) {
            return $matches[0];
        }
    }

    public static function filter_tel($str=''){
        if (preg_match('/^0\d{2,3}-\d{7,8}$/', $str, $matches)) {
            return $matches[0];
        }
    }

    public static function filter_pwd($str=''){
        if (preg_match('/^[a-zA-Z\d_]{8,}$/', $str, $matches)) {
            return $matches[0];
        }
    }

    public static function filter_captcha($str_post=''){
        if (preg_match('/^[0-9]{4}$/', $str_post, $matches)) {
            return $matches[0];
        }
    }

    public static function filter_order_id($str_post=''){
        if (preg_match('/^[0-9]{1,8}$/', $str_post, $matches)) {
            return $matches[0];
        }
    }

    public static function filter_ip($str_post=''){
        if (preg_match('/^(((1?\d{1,2})|(2[0-4]\d)|(25[0-5]))\.){3}((1?\d{1,2})|(2[0-4]\d)|(25[0-5]))$/', $str_post, $matches)) {
            return $matches[0];
        }
    }

    public static function filter_lvl($str_post=''){
        if (preg_match('/^[0-9]{1,2}$/', $str_post, $matches)) {
            return $matches[0];
        }
    }

    public static function filter_id($str_post=''){
        if (preg_match('/^[0-9]{8}$/', $str_post, $matches)) {
            return $matches[0];
        }
    }
    public static function check_client(){
        if(!Client::isMobile()){
            header("Location: http://www.huazhuedu.com");
            exit(0);
        }
    }

    public static function filter_bid($str=''){
        if (preg_match('/[0-9]{2}/', $str, $matches)) {
            return $matches[0];
        }
    }
    public static function filter_real_que_id($str=''){
        if (preg_match('/[0-9]{4}/', $str, $matches)) {
            return $matches[0];
        }
    }
    public static function filter_paper_id($str=''){
        if (preg_match('/[0-9]{1,4}/', $str, $matches)) {
            return $matches[0];
        }
    }

    public static function filter_id_num($str=''){
        if (preg_match('/(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/', $str, $matches)) {
            return $matches[0];
        }
    }

    public static function filter_chinese_name($str=''){
        if (preg_match('/[\x{4e00}-\x{9fa5}]{2,4}/u', $str, $matches)) {
            return $matches[0];
        }
    }

    public static function filter_class_id($str=''){
        if (preg_match('/[0-9]{1,6}/', $str, $matches)) {
            return $matches[0];
        }
    }
    public static function filter_company($str=''){
        if (preg_match('/[\x{4e00}-\x{9fa5}a-zA-Z0-9\(\)]*/u', $str, $matches)) {
            return $matches[0];
        }
    }

    public static function filter_cust_id($str=''){
        if (preg_match('/^[0-9]{1,8}$/', $str, $matches)) {
            return $matches[0];
        }
    }
    public static function filter_param($str=''){
        if (preg_match('/^[012]$/', $str, $matches)) {
            return $matches[0];
        }
    }

    public static function filter_count($str=''){
        if (preg_match('/^[1-9][0-9]*$/', $str, $matches)) {
            return $matches[0];
        }
    }

    public static function filter_test_id($str=''){
        if (preg_match('/[0-9]{5}[0-9kzsKZS]/', $str, $matches)) {
            return $matches[0];
        }
    }
    public static function filter_book_id($str=''){
        if (preg_match('/[0-9a-zA-Z]{2}/', $str, $matches)) {
            return $matches[0];
        }
    }
    public static function filter_test_stat($str=''){
        if (preg_match('/[12]/', $str, $matches)) {
            return $matches[0];
        }
    }
    public static function filter_study_id($str=''){
        if (preg_match('/[0-9]{2}-[0-9]{2}/', $str, $matches)) {
            return $matches[0];
        }
    }
}
