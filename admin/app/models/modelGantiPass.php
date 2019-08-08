<?php
class modelGantiPass{
    public function __construct(){
        $this->db = new Database;
    }
    public function updatePass($data){
        if($data['baru'] ==  $data ['ulang']){
            $passBaru = md5($data['baru']);
            $this->db->query("update users set password = '$passBaru' where username = '$data[user]'");
            $this->db->execute();
            return $this->db->rowCount();
        }else{
            return 0;
        }
        
    }
    public function cekUser($data){
        $cekPass = md5($data['lama']);
        $this->db->query("select count(*) as cek from users where username ='$data[user]' and password = '$cekPass'");
        return $this->db->Single();
    }
}
?>