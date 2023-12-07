<?php
class Dashboard extends Controller {
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

        // Tampilkan konten
        $this->view('Dashboard/index');

        // Tampilkan footer
        $this->view('layouts/footer');
    }
}
