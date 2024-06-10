<?php

namespace App\Models;

use CodeIgniter\Model;

class IrcModel extends Model
{
    protected $table = 'IRC';
    protected $primaryKey = 'id_informe';
    protected $allowedFields = [
        'id_solicitud',
        'unidad_solicitante',
        'orden_compra',
        'fecha',
        'fecha_entrega',
        'lugar_entrega',
        'destino_bienes',
        'observaciones',
        'nombreimagen',
        'factura'
    ];

    public function getIrcBySolicitud($id_solicitud)
    {
        return $this->where('id_solicitud', $id_solicitud)->findAll();
    }
}
