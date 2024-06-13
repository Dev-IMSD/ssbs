<?php

namespace App\Controllers;

use App\Controllers\view;
use App\Models\LoginModel;
use CodeIgniter\HTTP\ResponseInterface;
use ResponseTrait; 


class LoginController extends BaseController
{   

    public function index()
    {

        return view('login');
    }

    public function autentificar()
    {
        if ($this->request->getMethod() === 'post') {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            $modelo = new LoginModel();
            $user = $modelo->verificarUsuario($username, $password);
            
            return $this->response->setJSON($user);
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid request method']);
    }

    public function cambioClave()
    {

        return view('cambioClave');
    }


    public function actualizacionClave()
    {
        if($this->request->getMethod() === 'post'){
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            $modelo =new LoginModel();
            $user = $modelo->cambioClaveBd($username, $password);
            if($user){
                return $this->response->setJSON($user);
            }
            return $this->response->setJSON(['status' => 'error', 'message' => 'No funcionaaaaaa ']);
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'No esta recibiendo ']);

    }
}
