<?php 

class Admin extends Controller {
    public function index()  
    {   
    

        $this->view('admin/index');
  

    }

    public function doctor()
    {

        $this->view('admin/doctor');
    }
}