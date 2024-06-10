<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsModel extends Model
{
    protected $table = 'solicitudes_productos';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'producto', 
        'cuenta', 
        'unidad_medida', 
        'cantidad', 
        'id_convenio', 
        'link', 
        'tipoMoneda', 
        'montoDecimal', 
        'monto', 
        'monto_final', 
        'solicitud', 
        'entregado', 
        'marca', 
        'modelo', 
        'ancho', 
        'largo', 
        'alto', 
        'nro_serie', 
        'caracteristicas_tecnicas', 
        'color', 
        'material', 
        'nombre_responsable', 
        'rut_responsable', 
        'dependencia', 
        'imagen'
    ];

    public function getSolicitudById($id)
    {
        return $this->find($id);
    }

    public function getSolicitudesBySolicitud($solicitud)
    {
        return $this->where('solicitud', $solicitud)->findAll();
    } 
    
    
}
