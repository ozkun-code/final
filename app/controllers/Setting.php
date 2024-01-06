<?php
class Setting extends Controller
{
    public function index($name = null)
    {
        $role = $_SESSION['role'];

        $this->view('layouts/head/head');

        $loginModel = new LoginModel();
        $navView = $loginModel->getNavView($role);
        $this->view($navView);

        $settingModel = new SettingModel();

        // Initialize $data
        $data = [];

        // Cek apakah ada query pencarian
        if ($name) {
            $data['settings'] = $settingModel->getAllSetting();
        }

        $this->view('setting/index', $data);

        $this->view('layouts/footer/footer');
    }
}
