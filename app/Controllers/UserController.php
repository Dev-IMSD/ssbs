<?php

namespace App\Controllers;

use App\Models\SistemasUsersModel;
use CodeIgniter\HTTP\ResponseInterface;
use ResponseTrait;
class UserController extends BaseController
{
    public function showUsers(){
        $userModel = new SistemasUsersModel();

        // Llamar a la función del modelo que obtiene los usuarios en formato JSON
        $usersJson = $userModel->getUsersJson();

        return $this->response->setContentType('application/json')->setBody($usersJson);
    }

    public function showUserByRut($rut){
        $userModel = new SistemasUsersModel();
        // Llamar a la función del modelo que obtiene el usuario por RUT en formato JSON
        $userJson = $userModel->getUserByRutJson($rut);

        return $this->response->setContentType('application/json')->setBody($userJson);
    }

    public function sesion()
    {
        return view('sesion');
    }

    public function autenticar(){
        if ($this->request->getMethod() === 'post') {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            
            $model = new SistemasUsersModel();
            $user = $model->verificarUsuario($username, $password);
            return $this->response->setJSON($user);
             
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid request method']);
    }
    

    public function cambioClave()
    {

        return view('cambioClave');
    }
}
