<?php 

class Home extends Controller {
    public function index()  
    {   
  
        $this->view('layouts/head');
        $this->view('layouts/nav');
        $this->view('home/index');
        $this->view('layouts/footer');
  

    }
}