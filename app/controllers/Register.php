<?php 

class Register extends Controller {
    public function index()  
    {
        $this->view('register/index');
    }

    public function process()
    {
        $model = new UserModel();
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $model->createUser($_POST['email'], $hashed_password, 'patient');

        header('Location: ' . BASEURL . '/login/index');
    }
}


