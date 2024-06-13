<?php

namespace App\Models;

use CodeIgniter\Model;

class SistemasUsersModel extends Model
{
    protected $table = 'sistemas_users';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'habilitado',
        'username',
        'password',
        'rut',
        'dv',
        'nombre',
        'apellido',
        'sexo',
        'cargo',
        'direccion',
        'departamento',
        'telefono',
        'mail',
        'jefe',
        'director',
        'calidad_juridica',
        'grado',
        'escalafon',
        'fecha_contrato',
        'foto'
    ];
    protected $DBGroup = 'users';

    public function getUsersJson(){
        try {
            // Obtener todos los usuarios
            $users = $this->findAll();
            return json_encode($users);
        } catch (\Exception $e) {
            // Manejo de errores
            return json_encode(['error' => $e->getMessage()]);
        }
    }
    
    public function getUserByRutJson($rut){
        try {
            // Obtener usuario por RUT
            $user = $this->where('rut', $rut)->first();
            if ($user) {
                return json_encode($user);
            } else {
                return json_encode(['error' => 'User not found']);
            }
        } catch (\Exception $e) {
            // Manejo de errores
            return json_encode(['error' => $e->getMessage()]);
        }
    }
     public function getUserPass($username,$password){
        //try {
            // Consultando si db son 
            $user = $this->where('username',$username )->where('password',$password)->findAll();
            return($user);
        //} catch (\Exception $e) {
            // Manejo de errores
            //return json_encode(['error' => $e->getMessage()]);
        //}
     }
}
