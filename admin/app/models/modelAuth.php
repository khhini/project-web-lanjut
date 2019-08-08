<?php
class modelAuth{
    public function __construct(){
        $this->db = new Database;
    }
    public function validation($data){
        $username = $data['user'];
        $password = md5($data['pass']);
        $this->db->query("select * from users where username = '$username' and password = '$password'");
        return $this->db->single();
    }
}
?>