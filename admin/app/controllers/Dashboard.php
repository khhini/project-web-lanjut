<?php
class Dashboard extends Controller{
    public function index(){
        $data['judul'] = "Beranda";
        $data['notif'] = $this->model('modelHeader')->getAllNotification();
        $data['foto'] =  $this->model('modelHeader')->getFoto($_SESSION['user']);
        $data['pieChartJson'] = $this->model('modelHome')->pieChartJson();
        $data['barChartJson'] = $this->model('modelHome')->barChartJson();
        
        
        $this->view('templates/header',$data);
        $this->view('Dashboard/index',$data);
        
    }
}
?>