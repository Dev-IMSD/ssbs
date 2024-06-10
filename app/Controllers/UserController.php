<?php

namespace App\Controllers;

use App\Models\SistemasUsersModel;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    public function showUsers()
    {
        $userModel = new SistemasUsersModel();

        // Llamar a la función del modelo que obtiene los usuarios en formato JSON
        $usersJson = $userModel->getUsersJson();

        return $this->response->setContentType('application/json')->setBody($usersJson);
    }

    public function showUserByRut($rut)
    {
        $userModel = new SistemasUsersModel();

        // Llamar a la función del modelo que obtiene el usuario por RUT en formato JSON
        $userJson = $userModel->getUserByRutJson($rut);

        return $this->response->setContentType('application/json')->setBody($userJson);
    }
}
