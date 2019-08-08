<?php
class ModelGantiFoto{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function updateFoto($foto,$user){
        $this->db->query("update users set foto = '$foto' where username = '$user'");
        $this->db->execute();

        return $this->db->rowCount();

    }
}
?>