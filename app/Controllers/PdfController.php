<?php

namespace App\Controllers;

use App\Models\SolicitudModel;
use App\Models\ProductsModel;
use App\Models\VisacionesModel;
use App\Models\CdpModel;

use App\Controllers\BaseController;
use App\Libraries\DompdfLib;

class PdfController extends BaseController
{
    public function generate()
    {
        $dompdf = new DompdfLib();

        
        $data = [
            
        ];
        $html = view('pdf_template', $data);

        
        $dompdf->loadHtml($html);

        
        $dompdf->setPaper('A4', 'portrait');

        
        $dompdf->render();

        
        $dompdf->stream('document.pdf', ['Attachment' => 0]);
    }

    public function generatePdf($id_solicitud)
    {
    

        $solicitudModel = new SolicitudModel();
        $productsModel = new ProductsModel();
        $visacionesModel = new VisacionesModel();
        $cdpModel = new CdpModel();

        $data['solicitud'] = $solicitudModel->find($id_solicitud);        
        $data['products'] = $productsModel->getSolicitudesBySolicitud($id_solicitud);
        $data['fechaRecepcion'] = $visacionesModel->getFechaRecepcion($id_solicitud);        
        $data ['cdp'] = $cdpModel->getCdpByIdSolicitud($id_solicitud);



        $options = new \Dompdf\Options();
        $options->set('isRemoteEnabled', true); // Habilitar URLs remotas
    
        // Instancia de Dompdf con las opciones configuradas
        $dompdf = new \Dompdf\Dompdf($options);
        
        $html = view('pdf', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        
        
        $pdfOutput = $dompdf->output();
        
        
        return $this->response
                    ->setHeader('Content-Type', 'application/pdf')
                    ->setHeader('Content-Disposition', 'inline; filename="SSBS N°'.$id_solicitud.'"')
                    ->setBody($pdfOutput);
    }
}
