<?php 

class Login extends Controller {
    public function index()  
    {
        $this->view('login/index');
    }

    public function process()
    {
        $model = new LoginModel();
        $user = $model->getUserByEmail($_POST['email']);

        if ($user && password_verify($_POST['password'], $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];

            switch ($user['role']) {
                case 'super_admin':
                    header('Location: ' . BASEURL . '/superadmin/index');
                    break;
                case 'admin':
                    header('Location: ' . BASEURL . '/admin/index');
                    break;
                case 'suster':
                    header('Location: ' . BASEURL . '/doctors/index');
                    break;
                case 'patient':
                    header('Location: ' . BASEURL . '/patiens/index');
                    break;
                default:
                    header('Location: ' . BASEURL . '/login/index');
                    break;
            }
        } else {
            header('Location: ' . BASEURL . '/login/index');
        }
    }
}
