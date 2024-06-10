<?php

namespace App\Models;

use CodeIgniter\Model;

class VisacionesModel extends Model
{
    protected $table = 'visaciones';
    protected $primaryKey = 'id_cambio';
    protected $allowedFields = ['id_solicitud', 'usuario', 'accion', 'observacion', 'fecha', 'tipo'];

    public function getBySolicitud($id_solicitud){
        return $this->where('id_solicitud', $id_solicitud)->findAll();
    }

    public function getFechaRecepcion($solicitud){
        $result =  $this->select('fecha')
            ->where('id_solicitud', $solicitud)
            ->where('accion', 'Ingresada')
            ->findAll();

        if (!empty($result)) {
            return $result[0]['fecha'];
        } else {
            return null;
        }
    }

}
