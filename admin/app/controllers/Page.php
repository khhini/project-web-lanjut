<?php
class Page extends Controller{
    public function index(){
        $data['judul'] = "Page";
        //$this->view('templates/header',$data);
        $this->view('page/index');
    }
    public function page(){
        $this->view('page/page');
    }
}