<?php

class Register extends Controller
{
    protected $data = array();

    public function __construct()
    {
        // Menetapkan nilai di dalam konstruktor
        $this->data['nama_controller'] = 'register';
    }
    public function index()
    {
        $this->view('register/index');
    }

    public function process()
    {
        $model = new UserModel();
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $model->createUser($_POST['email'], $hashed_password, 'super_admin');

        header('Location: ' . BASEURL . '/login/index');
    }
}
