<?php
class Transaction extends Controller
{
   
    public function index()
    {

        if (!isset($_SESSION['role'])) {
            header('Location: ' . BASEURL . '/login/index');
            exit();
        }
        $role = $_SESSION['role'];
       

        $this->view('layouts/head/headts');

        $loginModel = new LoginModel();
        $navView = $loginModel->getNavView($role);
        $this->view($navView);


        // Tampilkan konten
        $this->view('Transaction/index');

        $this->view('layouts/footer/footerts');



    }
    public function print()
    {

        // Tampilkan konten
        $this->view('Transaction/print');




    }
}
