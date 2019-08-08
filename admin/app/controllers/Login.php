<?php
class Login extends Controller{
    public function index(){
        $this->view('login/index');
    }
    public function auth(){
        $data = $this->model('modelAuth')->validation($_POST);
        if($data){
            echo count($data);
            $_SESSION['user'] =  $data['username'];
            $_SESSION['foto'] =  $data['foto'];
            header("location: ".BASEURL."/Home");
            exit;
        }else{
            Flasher::setFlash('Login ','GAGAL','username atau password tidak cocok','danger');
            header("location: ".BASEURL."/Login");
            exit;
        }
    }
    public function logout(){
        if(isset($_SESSION['user']) && isset($_SESSION['foto'])){
            unset($_SESSION["user"]);
            unset($_SESSION["foto"]);
        }
        header("location: ".BASEURL."/Login");
        exit;
    }
}
?>