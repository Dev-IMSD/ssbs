<?php

namespace App\Models;

use CodeIgniter\Model;

class CdpCuentasModel extends Model
{
    protected $table = 'cdpCuentas';
    protected $primaryKey = 'id_seleccion';
    protected $allowedFields = [
        'id_solicitud',
        'cod_cuenta',
        'tipo_cuenta',
        'monto_cuenta',
        'moneda',
        'monto'
    ];

    public function getCuentasBySolicitud($id_solicitud)
    {
        return $this->where('id_solicitud', $id_solicitud)->findAll();
    }
}
