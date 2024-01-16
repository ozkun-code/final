<?php
class Setting extends Controller
{
    public function index($name = null)
    {
       

        $this->view('layouts/head/head');

        $navView = $this->model('Login_model')->getNavView($_SESSION['role']);
        $this->view($navView);


        $data = [];

        if ($name) {
            $data['settings'] = $this->model('Setting_model')->getAllSetting();
        }

        $this->view('setting/index', $data);

        $this->view('layouts/footer/footer');
    }
}
