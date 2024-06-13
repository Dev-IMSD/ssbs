
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://sistemas.santodomingo.cl/solicitud/Logoo.png' rel='shortcut icon' type='image/png'>
    <title>Cambiar Contraseña</title>
    <!-- <link href="<?php // echo base_url('flat/dist/css/flat-ui.css') ?>" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  
  <link href="https://unpkg.com/bootstrap-table@1.18.2/dist/bootstrap-table.min.css" rel="stylesheet">
  <script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
  <script src="https://unpkg.com/bootstrap-table@1.18.2/dist/bootstrap-table.min.js"></script>
  <script src="https://unpkg.com/bootstrap-table@1.18.2/dist/bootstrap-table-locale-all.min.js"></script>
  <script src="https://unpkg.com/bootstrap-table@1.18.2/dist/extensions/export/bootstrap-table-export.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style type="text/css">
    a, a:hover{
    color:#333
    }
    .select,
        #locale {
        width: 100%;
        }
        .like {
        margin-right: 10px;
    }
    body{
         background-color: #2bbea1; 
         font-family: Arial;
         color :#009174;
    }
    h2{
       color: #ecf0f1;
       font-size: 38px;
       margin-top: 20px;
    }
    h4 {
       color: #ecf0f1;
       font-size: 28px;
    }
      
    #containerlogin{
      background-color: #F5F5F5;
      color: #009174;
      max-width: 600px;
    }
    
    #row{
      
      padding: 20px;
      width: 100%;
    }

    @media screen and (max-width: 400px) {
        h2 { 
        font-size :33px;
        }
        h4{
        font-size :19px;
        }
    }    

    hr {
        margin-top: 20px;
        margin-bottom: 20px;
        margin-right: 70px;
        margin-left: 70px;
        border: 0;
        border-top-color: currentcolor;
        border-top-style: none;
        border-top-width: 0px;
        border-top: 1px solid #eee;
    }
  </style>
    
</head>
<body >
<div class="container" >
     <div class="row">             
          <img  src="https://sistemas.santodomingo.cl/solicitud/Logoo.png" height="100" width="100" style="float: left;margin-top: 20px;margin-right: 10px;">          
          <div  class="form-group">               
               <h2>Administración de Usuarios</h2>
               <h4>Cambio de datos personales</h4>          
          </div>
     </div>
</div>
<hr/>

<div id="containerlogin" class="container rounded">
  <div id="row" class="row">
    <div class="col-lg-12 col-sm-12">
          <!-- btn_info -->
          <?php 
          $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");
          echo form_open(base_url('index.php/solicitud/cambiar_pass'), $attributes);?>
          <!-- <form class="form-horizontal" id="loginform"> -->
               <fieldset>
                    <legend>Cambio de contraseña</legend>
                        <div class="form-group">
                            <div class="row colbox">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="txt_username" class="control-label">Nueva Contraseña</label>
                                </div>
                                <div class="container">                                                        
                                    <div class="form-group">
                                        <div class="input-group mb-3" id="show_hide_password1">
                                            <input class="form-control" type="password" id="new_pass" name="new_pass"> 
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a></span>
                                            </div>
                                            <script>
                                                $(document).ready(function() {
                                                    $("#show_hide_password1 a").on('click', function(event) {
                                                        event.preventDefault();
                                                        if($('#show_hide_password1 input').attr("type") == "text"){
                                                            $('#show_hide_password1 input').attr('type', 'password');
                                                            $('#show_hide_password1 i').addClass( "fa-eye-slash" );
                                                            $('#show_hide_password1 i').removeClass( "fa-eye" );
                                                        }else if($('#show_hide_password1 input').attr("type") == "password"){
                                                            $('#show_hide_password1 input').attr('type', 'text');
                                                            $('#show_hide_password1 i').removeClass( "fa-eye-slash" );
                                                            $('#show_hide_password1 i').addClass( "fa-eye" );
                                                        }
                                                    });
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row colbox">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="txt_username" class="control-label">Repetir Contraseña</label>
                                </div>
                                <div class="container">                                                        
                                    <div class="form-group">
                                        <div class="input-group mb-3" id="show_hide_password2">
                                            <input class="form-control" type="password" id="new_pass2" name="new_pass2"> 
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a></span>
                                            </div>
                                            <script>
                                                $(document).ready(function() {
                                                    $("#show_hide_password2 a").on('click', function(event) {
                                                        event.preventDefault();
                                                        if($('#show_hide_password2 input').attr("type") == "text"){
                                                            $('#show_hide_password2 input').attr('type', 'password');
                                                            $('#show_hide_password2 i').addClass( "fa-eye-slash" );
                                                            $('#show_hide_password2 i').removeClass( "fa-eye" );
                                                        }else if($('#show_hide_password2 input').attr("type") == "password"){
                                                            $('#show_hide_password2 input').attr('type', 'text');
                                                            $('#show_hide_password2 i').removeClass( "fa-eye-slash" );
                                                            $('#show_hide_password2 i').addClass( "fa-eye" );
                                                        }
                                                    });
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    
                    <!-- <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="cambiar_pass" name="cambiar_pass" value="si" value="<?php echo set_value('cambiar_pass'); ?>">
                            <label class="form-check-label" >
                            Cambiar contraseña al iniciar sesión
                            </label>
                        </div>   
                    </div>        -->
                    <div class="row">
                        <div class="col-sm-12">
                        <label id="coincide"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12 col-sm-12 text-center">
                            <input id="btn_login" name="btn_login" type="submit" class="btn" style="background-color: #63d245; color:white;" disabled  value="Actualizar" />
                        </div>
                    </div>
                    <script>                          
                        $("#new_pass2").keyup(function(){
                            // https://bootsnipp.com/snippets/8v4K
                            // var ucase = new RegExp("[A-Z]+");
                            // var lcase = new RegExp("[a-z]+");
                            // var num = new RegExp("[0-9]+");
                            
                            // if($("#password1").val().length >= 8){
                            //     $("#8char").removeClass("glyphicon-remove");
                            //     $("#8char").addClass("glyphicon-ok");
                            //     $("#8char").css("color","#00A41E");
                            // }else{
                            //     $("#8char").removeClass("glyphicon-ok");
                            //     $("#8char").addClass("glyphicon-remove");
                            //     $("#8char").css("color","#FF0004");
                            // }
                            
                            // if(ucase.test($("#password1").val())){
                            //     $("#ucase").removeClass("glyphicon-remove");
                            //     $("#ucase").addClass("glyphicon-ok");
                            //     $("#ucase").css("color","#00A41E");
                            // }else{
                            //     $("#ucase").removeClass("glyphicon-ok");
                            //     $("#ucase").addClass("glyphicon-remove");
                            //     $("#ucase").css("color","#FF0004");
                            // }
                            
                            // if(lcase.test($("#password1").val())){
                            //     $("#lcase").removeClass("glyphicon-remove");
                            //     $("#lcase").addClass("glyphicon-ok");
                            //     $("#lcase").css("color","#00A41E");
                            // }else{
                            //     $("#lcase").removeClass("glyphicon-ok");
                            //     $("#lcase").addClass("glyphicon-remove");
                            //     $("#lcase").css("color","#FF0004");
                            // }
                            
                            // if(num.test($("#password1").val())){
                            //     $("#num").removeClass("glyphicon-remove");
                            //     $("#num").addClass("glyphicon-ok");
                            //     $("#num").css("color","#00A41E");
                            // }else{
                            //     $("#num").removeClass("glyphicon-ok");
                            //     $("#num").addClass("glyphicon-remove");
                            //     $("#num").css("color","#FF0004");
                            // }
                            var input = document.getElementById("btn_login");

                            if($("#new_pass").val() == $("#new_pass2").val()){                                
                                document.getElementById('coincide').innerHTML = 'Las contraseñas coinciden.';
                                input.disabled = false;
                                // console.log("Es igual");
                            }else{                                                              
                                document.getElementById('coincide').innerHTML = 'Las contraseña no coinciden.';
                                input.disabled = true;
                                // console.log("no es igual");
                            }
                        });
                    </script>

               </fieldset>               
          <!-- </form> -->
          <?php echo form_close(); ?>
          <?php echo $this->session->flashdata('msg'); ?>
          <?php //echo $this->session->flashdata('err'); ?>
    

          </div>
     </div>
</div>
</body>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="<?=base_url('assets/js/auth/login.js') ?>"></script> -->
</html>