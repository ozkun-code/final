<?php 

class Superadmin extends Controller {
    public function index()  
    {   
    

        $this->view('superadmin/index');
  

    }

    public function doctor()
    {

        $this->view('admin/doctor');
    }
}