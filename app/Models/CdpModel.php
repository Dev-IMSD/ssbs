<?php

namespace App\Models;

use CodeIgniter\Model;

class CdpModel extends Model
{
    protected $table = 'cdp';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'numero',
        'fecha',
        'nombre_encargado',
        'id_solicitud',
        'correlativo',
        'decreto',
        'fecha_decreto',
        'sesion',
        'num_sesion',
        'num_acuerdo',
        'area_gestion',
        'observacion',
        'fuente_financiamiento',
        'cuenta',
        'adjunto'
    ];

    public function getCdpByIdSolicitud($id_solicitud)
    {
        $result =  $this->where('id_solicitud', $id_solicitud)
                    ->findAll();

        if (!empty($result)) {
            return $result[0];
        } else {
            return null;
        }
    }
}
