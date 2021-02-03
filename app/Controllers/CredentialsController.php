<?php namespace App\Controllers;

class CredentialsController extends BaseController
{   
    private $username = 'admin';
    private $password = 'admin';
    
    public function validate_user() {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        
        $validate = false;

        if(isset($username) && isset($password)) {
            if($this->username != $username || $this->password != $password) {
                session()->setFlashdata('_error1', 'Username / Password Salah');
            } else {
                $validate = true;
            }
        } else {
            session()->setFlashdata('_error2', 'Username / Password Kosong');
        }

        if ($validate) {
            return redirect()->to(base_url('admin-panel/dashboard'));
        } else {
            return redirect()->to(base_url('admin-panel'));
        }
    }
}
