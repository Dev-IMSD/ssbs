<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Inicio de Sesion</title>
</head>
<style>
    .select,
    #locale {
        width: 100%;
    }

    .like {
        margin-right: 10px;
    }
</style>
<style type="text/css">
    *{
        font-family:'Poppins',sans-serif;
        margin: 0;
        padding: 0;

    }
    body {
        background-color: #2bbea1;
        font-family: Arial;
        color: #009174;
    }

    h2 {
        color: #ecf0f1;
        font-size: 38px;
        margin-top: 20px;
    }

    h4 {
        color: #ecf0f1;
        font-size: 28px;
    }

    #titulo {
        color: #009174;
    }

    label {
        color: #009174;
    }
    

    #containerlogin {
        display: flex;
        color: #009174;
        max-width: 600px;
    }

    #ini {
        background-color: #63d245;
    }

    #row {

        padding: 20px;
        width: 100%;

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
<body>
    <div class="container">
        <div class="row text-center">
            <div class="form-group">
                <img src="https://sistemas.santodomingo.cl/solicitud/Logoo.png"   height="150" width="150" style="float: left;margin-top: 20px;margin-right: 10px;">
                <h2 class="">Sistema de Solicitud de Bienes y Servicios</h2>
                <h4 class="">Ingrese Sesión para entrar al sitio</h4>
            </div>
        </div>

    </div>
    <hr>
    <div class="container" id="containerlogin">
        <div class="card shadow-lg form-signin" id="row">

            <div class="card-body p-3">
                <h1 class="fs-4 card-title fw-bold mb-4 text-center" id="titulo">Iniciar sesión</h1>
                <!-- <form method="POST" action="<?= base_url(route_to('inicio')) ?>" autocomplete="off"> -->
                <form autocomplete="off" id="loginForm">
                    <div class="mb-3">
                        <label class="mb-2" for="username">Usuario</label>
                        <input type="text" class="form-control" name="username" id="username" required >
                    </div>

                    <div class="mb-3">
                        <div class="mb-2 w-100">
                            <label for="password">Contraseña</label>
                        </div>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                        Cambiar contraseña al iniciar sesión 
                        </label>
                    </div>
                    
                    <div class="d-grid gap-2 col-4 mx-auto my-3" id="Ini">
                        <button type="submit" class="btn position-fixed" style="background-color: #63d245; color:#ecf0f1;" >
                            Iniciar sesion
                        </button>
                    </div>
                </form>

                <!-- <?php  /*if (session()->getFlashdata('errors') !== null) : ?>
                    <div class="alert alert-danger my-3" role="alert">
                        <?= session()->getFlashdata('errors'); ?>
                    </div>
                <?php endif;*/ ?> -->


            </div>
            <script>
                document.getElementById('loginForm').addEventListener('submit', function (e) {
                    e.preventDefault();

                    let username = document.getElementById('username').value;
                    let password = document.getElementById('password').value;

                    fetch('<?= base_url('/autenticar') ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ username: username, password: password })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: data.message
                            });
                        } else {
                            Swal.fire({
                                icon: data.status,
                                title: 'Error',
                                text: data.message
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                });
            </script>
           
        </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>