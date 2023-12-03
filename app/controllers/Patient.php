<?php 

class Patient extends Controller {
    public function index()  
    {   
    

        $this->view('patient/index');
  

    }

    public function doctor()
    {

        $this->view('patient/doctor');
    }
}