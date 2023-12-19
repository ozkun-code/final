<?php
class Drug extends Controller
{
    public function index()
    {

        $role = $_SESSION['role'];

        $this->view('layouts/head');

        $loginModel = new LoginModel();
        $navView = $loginModel->getNavView($role);
        $this->view($navView);

        $drugModel = new DrugModel();
        $data['drugs'] = $drugModel->getAllDrug();

        $this->view('drug/index', $data);

        $this->view('layouts/footer');
    }
}
