<?php
class Appointments extends Controller {
    public function index()  
    {

        if (!isset($_SESSION['role'])) {
            header('Location: ' . BASEURL . '/login/index');
            exit();
        }
        $role = $_SESSION['role'];

        $this->view('layouts/head');

        $loginModel = new LoginModel();
        $navView = $loginModel->getNavView($role);
        $this->view($navView);

        $this->view('Appointments/index');

        $this->view('layouts/footer');

    }
}
