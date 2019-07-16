<?php
class Home extends Controller{
    public function index(){
        $data['judul'] = "Home";
        $data['notif'] = $this->model('modelHeader')->getAllNotification();
        $this->view('templates/header',$data);
        $this->view('home/index');
    }
}
?>