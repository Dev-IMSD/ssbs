<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    
    <link rel="icon" type="image/png" href="<?php echo base_url('/public/logo.png'); ?>">
	<title> Solicitud N° <?= esc($solicitud['id_solicitud']) ?>  </title> 
    
</head>
<style>
    body{ 
        font-size: 12px;
        font-family: Calibri Light;
    }
	#cuerpo{	 
	    padding:  18px;
	    height: 200%; 
	}
	#Cabecera,#body{		 
	    border: 2px solid lightgrey;
	    padding:  8px; 
	    margin-right: -50px;
		margin-left:-50px ;		
	    margin-top: -50px;      
	}
	#irc{		 
	    border: 2px solid lightgrey;
	    padding:  8px; 
	    margin-right: -50px;
		margin-left:-50px ;		
	    margin-top: -50px;      
	}
	table#t01 th {
	    background-color: lightgrey;
	    /* color: black; */
        color: #595959;
	}
    table#t01 tr {
        /* border-style:solid; */
        border: 1px solid;
        
	    border-collapse: collapse;
	}
	table#t01 td {
	    /* background-color: lightgrey; */
	    /* color: black; */ padding-top: 5px; /* Ajusta el espacio superior */
        padding-bottom: 5px; /* Ajusta el espacio inferior */
        color: #595959;
	}
    hr {
        border: none;  
        border-top: 1px solid rgba(0, 0, 0, 0.4);
    }
    td {
        padding-top: -2px; /* Ajusta el espacio superior */
        padding-bottom: -2px; /* Ajusta el espacio inferior */
    }
    .list-item {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }
    .list-item label {
        width: 250px;
        margin-right: 10px;
        
    }
</style>

<body >
   
<section id="cuerpo"  >
<div id="Cabecera">
    
    <div style="margin-left:20px;margin-right:20px;padding-bottom:50px ">
    <img src="<?php echo base_url('/public/Logoo.png'); ?>" height="52" width="52" style="float: left;">
        <div style=" float: left; margin-left:5px; margin-top: -15px; width: 38%; text-align: center; font-size: 12px;color: #595959;">
        <p style="float: left;"> Ilustre Municipalidad de Santo Domingo  
            <br> Direccion de Administración y Finanzas 
            <br> Departamento de Adquisiciones </p>
        </div>

        <div style=" float: right; margin-right: 5px; margin-top:  -20px; width: 58%;text-align: right; ">            
            <p style="color: #0174c3; padding-bottom: -15px;font-size:22px;"  ><b> SOLICITUD DE BIENES Y SERVICIOS</b> </p> 
            <h1 style="color: #595959;margin-top: -15px;">N° <?php echo esc($solicitud['id_solicitud']) ?></h1>
            <hr style="margin-top: -5px;" >
            <p  style="margin-top: -5px;color: #595959; " >Fecha de Emisión <?php echo date("d-m-Y", strtotime(esc($solicitud['fechasolicitud'])));    ?></p>
            <?php if ($fechaRecepcion != null){?>
                <p  style="margin-top: -10px;color: #595959; " >Fecha de recepción en Adquisiciones <?php echo date("d-m-Y", strtotime(esc($solicitud['fechasolicitud'])));?> </p>
            <?php 
               }           
            ?> 
        </div>
    </div>
    <div style="margin-left:10px;margin-right:10px; ">
    <div style="margin-top: 60px;">
        <h3 style="color:#0174c3;"> I. Individualización de la solicitud de bienes y/o servicios. </h3>
        <hr >
        <table id="t01" style="width: 100%; text-align: center; " >
            <tr>
                <th style="width: 8%">Cantidad</th>
                <th style="width: 9%">Unidad </th>
                <th>Detalle del bien o servicio que se requiere </th>
                <th style="width: 8%">LINK</th>
            </tr>
        
                <?php 
                    if(esc($products)){
                    foreach($products as $product):    
                ?>  
            <tr>
                <td><?= esc($product['cantidad']) ?></td>
                <td><?= esc($product['unidad_medida']) ?></td>
                <td><?= esc($product['producto']) ?></td> 
                <td>
                    <?php if (esc($product['link'])!="" ) { ?>
                        <a href="<?= esc($product['link']) ?>">Link</a>
                    <?php } ?>
                    
                </td>
            </tr>
            <?php
                endforeach;
                }
            ?>          
        </table> 
        
        <!-- Datos Solicitud -->
        <div style="color: #595959;"> 
            <h3 style="color:#0174c3;"> II. Consideraciones. </h3>
            <hr style="margin-top: -10px;">
            <div class="list-item">
                <label>Destino de la compra :</label>
                <b><?php echo esc($solicitud['destinocompra']) ;?></b>
            </div>
            <div class="list-item">
                <label>Periodo de Ejecución y/o Fecha esperada de recepción :</label>
                <b><?php $recepcion = date("d-m-Y", strtotime(esc($solicitud['fecharecepcion']))); echo $recepcion;?></b> 
            </div>
            <div class="list-item">
                <label>Lugar de Recepción de los Bienes o Servicios Requeridos :</label>
                <b><?php  echo esc($solicitud['lugarrecepcion']) ;?></b>  
            </div>
            <div class="list-item">
                <label>Fecha esperada de contrato :</label>
                <b><?php 
                    $contrato = date("d-m-Y", strtotime(esc($solicitud['fechacontrato'])));
                    if(!$contrato =='00-00-0000'){ echo $contrato;}else{echo "N/A";}?>
                </b> 
            </div>
            <div class="list-item">
                <label>Hora recepción de productos :</label> 
                <b><?php 
                    $hora = esc($solicitud['horarecepcion']);
                    if(!$hora =='00:00:00'){ echo $hora;}else{echo "N/A";} ?>
                </b>  
            </div>
            <div class="list-item">
                <label>Presupuesto :</label> 
                <?php   
                    if (is_null(esc($solicitud['moneda']))) {
                        $moneda = "$ " ;
                    } else {
                        $moneda = esc($solicitud['moneda']);
                    }
                ?>
                <b><?php echo $moneda." ".number_format(esc($solicitud['costototal']) , 0, ',', '.' ); ?></b>  
            </div>
            <div class="list-item">
                <label>Tipo de Solicitud :</label> 
                <b><?php echo esc($solicitud['tipo']) ;?></b>
            </div>
            <?php if (esc($solicitud['comentarios'])!= null || esc($solicitud['comentarios'])!="" ) { 
            echo '<div class="list-item" >
                        <label>Comentarios y/o especificaciones:</label>
                        <b>'.esc($solicitud['comentarios']).'</b> 
                    </div>';
            }?>
        
            <?php if (esc($solicitud['popaa'])!= null || esc($solicitud['popaa'])!="" ) { 
                echo '<div class="list-item" >
                        <label style="margin-right: -20px; padding-left: 40px; display: block;">Proyecto, Obra, Programa o Actividad Asociado:</label>
                        <b>'.esc($solicitud['popaa']).'</b> 
                    </div>';

            }?>

            <?php if (esc($solicitud['estado']) == "Rechazada" && esc($solicitud['observacion'])!= null || esc($solicitud['observacion'])!="" ) { 
                echo '<div class="list-item" >
                        <label style="margin-right: -20px; padding-left: 40px; display: block;">Motivo de rechazo:</label></b> 
                        <b>'.esc($solicitud['observacion']).'</b>                 
                    </div>';

            }?>
            <?php 
                if (esc($solicitud['tipo_licitacion']) != null || esc($solicitud['tipo_licitacion']) !="" ) { 
                    echo '<hr>
                    <div class="list-item" >
                        <label  >Mecanismo de Compra:</label>
                        <b>'.esc($solicitud['tipo_licitacion']) .'</b>                                 
                    </div>';

                    if(esc($solicitud['observacion_mecanismo']) != null || esc($solicitud['observacion_mecanismo']) !="" ) { 
                        echo '                
                        <div class="list-item" >
                            <label  >Observacion :</label>
                            <b>'.esc($solicitud['observacion_mecanismo']) .'</b> 
                        </div>';     
                    }

                }  
            ?>       
        

            <h3 style="color:#0174c3;"> III. Datos de la Unidad Municipal Solicitante. </h3>
    
            <hr style="margin-top: -10px;">
            <div class="list-item">
                <label  > Departamento / Unidad : </label>
                <b><?php echo esc($solicitud['departamento']) ;?></b>                
            </div>    
            <div class="list-item">
                <label >Direccion solicitante :  </label>
                <b> <?php echo esc($solicitud['direccionsolicitante']);?>  </b>
            </div>        
            <div class="list-item">
                <label >Nombre solicitante  :</label>
                <b><?php echo esc($solicitud['nombresolicitante']) ;?></b>
            </div>        
            <div class="list-item">
                <label >Cargo solicitante :</label>
                <b><?php echo esc($solicitud['cargosolicitante']) ;?></b>
            </div>        
            <div class="list-item">
                <label >Teléfono de contacto :</label>
                <b> <?php echo esc($solicitud['telefonocontacto']) ;?></b>
            </div>        
            
            <table id="t2" style=" margin-bottom:10px;  "  style="color: #595959;">
                <tr >
                <td style="vertical-align: middle; text-align: center; <?php if (esc($solicitud['firma_solicitante'])== null) { echo "padding-top:10%;";} ?> padding-right: 20px;   " >
                    <?php if (esc($solicitud['firma_solicitante'])!= null) {?>
                        <img src="<?php echo base_url('/public/firmas/'.esc($solicitud['firma_solicitante'])) ?>.jpg" height="100" width="150"  >
                    <?php }else{ echo "________________________________________"; }?>
                    <br> 
                    <small>Firma Funcionario/a Solicitante</small>
                </td>

                    <td style="vertical-align: middle; text-align: center;<?php if (esc($solicitud['firma_director'])== null) { echo "padding-top:10%;";} ?> padding-right: 20px; " >
                    <?php if (esc($solicitud['firma_director'])!= null) {?>
                        <img src="<?php echo base_url('/public/firmas/'.esc($solicitud['firma_director'])) ?>.jpg" height="100" width="150"  >
                    <?php }else{ echo "________________________________________"; }?>
                    <br> 
                        <small>Firma y timbre Jefatura Solicitante</small>
                    </td>
                    
                    <td style="vertical-align: middle; text-align: center;padding-right: 20px; " >                      
                        <?php if (esc($solicitud['firma_secpla'])!=0) { echo '
                            <img src="'.base_url('/public/firmas/'.esc($solicitud['firma_secpla'])).'.jpg" height="100" width="150">                      
                            <br> 
                            <small>Firma y timbre SECPLA</small>';                    
                        } ?> 
                    </td>      
                    <td style="vertical-align: middle; text-align: center;padding-right: 20px; " >                      
                        <?php 
                        
                        $rut_admin = null;
                        if (esc($solicitud['firma_admin'])=='si') {
                            echo '
                            <img src="'.base_url('/public/firmas/'.esc($solicitud['rut_admin'])).'.jpg" height="100" width="150">                      
                            <br> 
                            <small>Firma y timbre Administrador Municipal</small>';                    
                        } ?> 
                    </td>       
                    <td style="vertical-align: middle; text-align: center;padding-right: 20px; " >             
                        <?php if (esc($solicitud['firma_informatica'])=='si') { echo '
                            <img src="http://sistemas.santodomingo.cl/solicitud/firmas/informatica.jpg" height="100" width="150"  >
                            <br> 
                            <small>Firma y timbre Depto. Informática </small>';                    
                        } ?>
                    </td>
                </tr>
            </table>  
            
            <div class="list-item">
                <label >
                    El funcionario/a solicitante declara que: <br>
                    <strong>a)</strong> Conoce el <strong>Manual de Procedimientos de Adquisiciones</strong>, aprobado por el decreto alcaldicio N° 002057, de fecha 30-12-2019;<br>
                    <strong>b)</strong> La presente solicitud fue previamente puesta en conocimiento de su Jefatura Directa y aprobada por la misma Jefatura de la Unidad Solicitante;<br>
                    <strong>c)</strong> Se compromete a acatar la resolución, instrucciones, plazos o antecedentes que determine o solicite el <strong>Departamento de Adquisiciones</strong>, la Dirección de
                    Administración y Finanzas y/o la Dirección de Control Municipal, con la finalidad de dar fiel cumplimiento a las disposiciones establecidas en la <strong>Ley de
                    Compras (ley N° 19.886) y a su Reglamento (Decreto N° 250, de 2004, del Ministerio de Hacienda)</strong>;
                </label>
            </div>  
            <?php /*if ($links) {?>
                <h4 style="color:#0174c3;"> Documentos adicionales. </h4>
                <?php }            
            
                for ($i=0; $i < count($links) ; $i++) {     
                    echo '<a target="_blank" href="'.$links[$i].'">Anexo '.(1+$i).'</a><br>';                  
                } */
            
            ?>  
        </div>
                  
    </div>   
     <!-- Datos CDP -->
     <div style="color: #595959;">
        <?php if ($solicitud['firma_daf']== 'Si') {?>
                    
            <p style="page-break-before: always">    
            <div style=" margin-bottom: 140px ; ">
                <img src="<?php echo base_url('/public/Logoo.png'); ?>" height="52" width="52" style="float: left;">

                <div style=" float: left; margin-left:-2px; margin-top: -20px; width: 40%; text-align: center; font-size: 12px;color: #595959;">
                <p style="float: left;"> Ilustre Municipalidad de Santo Domingo  
                    <br> Direccion de Administración y Finanzas 
                    <br> Departamento de Adquisiciones </p>
                </div>

                <div style=" float: right; margin-right: 5px; margin-top: -20px; width: 58%;text-align: right; ">

                    <p style="color: #0174c3; padding-bottom: -15px;font-size:22px;"  > <b>CERTIFICADO DE APROBACIóN PRESUPUESTARIA</b></p> 
                    <h1 style="color: #595959;margin-top: -15px;">N° <?php if( is_null(esc($cdp['correlativo']))){
                                    echo esc($cdp['numero']);
                                }else {
                                    echo esc($cdp['correlativo']);
                                } 
                    ?></h1>
                    <hr style="margin-top: -15px; margin-left:5px;">
                    <p  style="margin-top: -5px;color: #595959;" >Fecha de Aprobación <?php echo esc($cdp['fecha']) ;?></p>
                </div>
            </div>
            <div style=" margin-left:10px ; width: 100%; font-family: Helvetica Neue; ">
            <h3 style="color:#0174c3;"> IV. Aprobación Presupuestaria. </h3>
            <!-- -->
            <hr style="margin-top: -10px;">

            <div class="list-item">
                <label > Decreto Alcaldicio Aprueba Modificación Presupuestaria: </label>
                <b><?php echo  esc($cdp['decreto']) ;?> </b>
            </div>    
            <div class="list-item">                             
                <label > Fecha de decreto Alcaldicio: </label>
                <b><?php echo  esc($cdp['fecha_decreto']) ;?> </b>

            </div>    
            <div class="list-item">
                <label>Sesion :</label>
                <b><?php echo  esc($cdp['sesion']) ;?></b>

            </div>    
            <div class="list-item">
                <label>Número de sesión :</label>
                <b> <?php echo  esc($cdp['num_sesion']) ;?></b>

            </div>    
            
            <div class="list-item">                             
                <label>Número de acuerdo :</label>
                <b> <?php echo  esc($cdp['num_acuerdo']) ;?></b>

            </div>  
            <div class="list-item">
                <label>Area de Gesión :</label>
                <b> <?php echo  esc($cdp['area_gestion']);  ?> </b>


            </div>    
            <div class="list-item">                             
                <label>Observación :</label>
                <b> <?php echo  esc($cdp['observacion']);  ?> </b>


            </div>    
            <div class="list-item">                             
                <label>Fuente financiamiento :</label>
                <b> <?php echo  esc($cdp['fuente_financiamiento']);  ?> </b>

            </div>   
            <?php if (  esc($cdp['adjunto']) !=null) {?> 
                <div class="list-item">                                
                    <label>Archivo adjunto :</label>
                    <a target="_blank" href="cdp/<?php echo  esc($cdp['adjunto']);  ?>"><?php echo  esc($cdp['adjunto']);  ?> </a>

                </div>                    
            <?php } ?>  

            <div class="list-item">
            </div>  
            <div class="list-item">
            </div>  
            <div class="list-item">
            </div>  
            <div class="list-item">
            </div>  
            
        
            <?php /*
            $montocp = 0;
            $montocc = 0;
            if ($cdp_cuentas_p) {?>
                        <table id="t01" style="width: 100%; text-align: left; " >
                            <tr>
                                <th style="width: 8%">Cuenta Presupuestaria</th>
                                <th style="width: 9%">Monto Cuenta </th>                               
                            </tr>
                        
                                <?php 
                                
                                foreach($cdp_cuentas_p as $cdp_cuenta_p){  
                                    $montocp = $montocp +$cdp_cuenta_p->monto_cuenta;
                                ?>  
                            <tr>
                            <td><?php echo $cdp_cuenta_p->cod_cuenta;?></td>
                            
                            <?php   
                            if (is_null($cdp_cuenta_p->moneda)) {
                                $moneda_cp = "$ " ;
                            }else {
                                $moneda_cp = $cdp_cuenta_p->moneda;
                            }
                            ?>
                            <td><?php echo $moneda_cp." ".number_format($cdp_cuenta_p->monto_cuenta , 0, ',', '.' );?></td>                           
                            </tr>
                            <?php
                                    }
                                
                            ?>
                            <tr>
                                <th style="text-align:right">Total</th>
                                <th><?php echo $moneda." ".number_format($montocp , 0, ',', '.' );?></th>     
                            </tr>     
                        </table>                         
                        <br/>
                    <?php }?>
                    <?php if ($cdp_cuentas_c ) { ?>
                        <table id="t01" style="width: 100%; text-align: left; " >
                            <tr>
                                <th style="width: 8%">Cuenta Complementaria</th>
                                <th style="width: 9%">Monto Cuenta </th>                               
                            </tr>
                        
                                <?php 
                                
                                foreach($cdp_cuentas_c as $cdp_cuenta_c){ 
                                    $montocc = $montocc +$cdp_cuenta_c->monto_cuenta;
                                ?>  
                            <tr>
                                <td><?php echo $cdp_cuenta_c->cod_cuenta;?></td>
                                <?php   
                                    if (is_null($cdp_cuenta_c->moneda)) {
                                        $moneda_cc = "$ " ;
                                    }else {
                                        $moneda_cc = $cdp_cuenta_c->moneda;
                                    }
                                ?>
                                <td><?php echo $moneda_cc." ".number_format($cdp_cuenta_c->monto_cuenta , 0, ',', '.' );?></td>                   
                            </tr>
                            <?php
                                    }
                                
                            ?>     
                            <tr>
                            <th style="text-align:right">Total</th>
                            <th><?php echo $moneda." ".number_format($montocc , 0, ',', '.' );?></th>     
                            </tr>
                        </table> 
                    <?php }?>
                        <table id="t01" style="width: 100%; text-align: left; " >
                            <tr>
                                <th>Total general</th>
                                <th><?php echo $moneda." ".number_format(($montocc+$montocp) , 0, ',', '.' );?></th>                             
                            </tr>                        
                            
                        </table>                        
                        <br> <?php*/ ?>
                <div style="text-align: center;">   
                    <?php 
                        if (esc($cdp['fecha']) >= "2024-04-08" && esc($cdp['fecha']) <= "2024-04-12" ) { ?>
                            <img src="<?php echo base_url('/public/firmas/10489773.jpg'); ?>" height="100" width="150"  >
                        <?php } else { ?>
                            <img src="<?php echo base_url('/public/firmas/cdp.jpg'); ?>" height="100" width="150"  >
                        <?php }
                    ?>
                    <!-- <img src="http://sistemas.santodomingo.cl/solicitud/firmas/cdp.jpg" height="100" width="150"  > -->
                <br> 
                    <small>Firma y timbre Administración y Finanzas</small>
                </div>  
            </div>
            <?php  
        } ?>
    </div>     
</div>
 


</div>
</section>
</body>
    
</html>