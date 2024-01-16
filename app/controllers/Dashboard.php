<?php
class Dashboard extends Controller
{
   
    public function index()
    {
       

        $this->view('layouts/head/head');
        
        $navView = $this->model('Login_model')->getNavView($_SESSION['role']);
        $this->view($navView);

        $this->view('dashboard/index');

        $this->view('layouts/footer/footer');



    }
}
