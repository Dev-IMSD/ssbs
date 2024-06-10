<?php

namespace App\Models;

use CodeIgniter\Model;

class SolicitudModel extends Model
{
    protected $table = 'solicitudes_compra';
    protected $primaryKey = 'id_solicitud';
    protected $returnType = 'array';
    protected $allowedFields = [
        'id_solicitud', 'estado', 'tipo_solicitud', 'ordendecompra', 'numeroorden',
        'numeropedido', 'factura', 'nombrefactura', 'link_factura', 'id_docux',
        'nombredocux', 'fechasolicitud', 'recepcion_adquisiciones', 'destinocompra',
        'lugarrecepcion', 'cotizaciones', 'imagenes', 'nombreimagen', 'nombrecotizacion',
        'informatico', 'licitacion', 'lic_doc1', 'lic_doc2', 'lic_doc3', 'fecharecepcion',
        'fechacontrato', 'horarecepcion', 'costo_estimado', 'costototal', 'costofinal',
        'moneda', 'tipo', 'comentarios', 'popaa_tipo', 'popaa', 'popaa_year',
        'direccionsolicitante', 'nombresolicitante', 'rutsolicitante', 'telefonocontacto',
        'departamento', 'cargosolicitante', 'responsable', 'observacion', 'observaciondaf',
        'firma_solicitante', 'firma_director', 'firma_informatica', 'firma_admin', 'rut_admin',
        'firma_secpla', 'si', 'firma_daf', 'irc', 'tipo_licitacion', 'observacion_mecanismo'
    ];
}
