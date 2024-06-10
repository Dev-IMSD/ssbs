<?php

namespace App\Models;

use CodeIgniter\Model;

class PermisosModel extends Model
{
    protected $table = 'sistemas_sistemasxusuario';
    protected $primaryKey = 'id_permiso';
    protected $allowedFields = [
        'id_sistema',
        'id_usuario',
        'nivel_acceso',
        'tipoadmin',
        'permiso_adicional',
        'estado'
    ];
 
    public function getPermisosByUsuario($id_usuario,$id_sistema)
    {
        return $this->where('id_usuario', $id_usuario)
        ->where('id_sistema', $id_sistema)
        ->findAll();
    }
 
}
