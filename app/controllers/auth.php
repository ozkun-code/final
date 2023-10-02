<?php 

class Auth  extends Controller {
    public function index()  
    {
        $this->view('layouts/head');
        $this->view('auth/login');   
    }
    

    public function page() 
    {
        $this->view('about/page');
    }
}
