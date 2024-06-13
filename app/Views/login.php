<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/styles.css">
    <title>Inicio de Sesion</title>
</head>

<body>
    <div class="container">
        <div class="row text-center">
            <div class="form-group">
                <img src="https://sistemas.santodomingo.cl/solicitud/Logoo.png" height="150" width="150" style="float: left;margin-top: 20px;margin-right: 10px;"> <!--  si se quiere  vovler el logo a la izquierd style="float: left;margin-top: 20px;margin-right: 10px;"-->
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
                <form id="loginForm" autocomplete="off">

                    <div class="mb-3">
                        <label class="mb-2" for="username">Usuario</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>

                    <div class="mb-3">
                        <div class="mb-2 w-100">
                            <label for="password">Contraseña</label>
                        </div>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="cambioClave">
                        <label class="form-check-label" for="cambioClave">
                            Cambiar contraseña al iniciar sesión
                        </label>
                    </div>

                    <div class="d-grid gap-2 col-4 mx-auto my-3" id="Ini">
                        <button type="submit" class="btn position-fixed" style="background-color: #63d245; color:#ecf0f1;">
                            Iniciar sesion
                        </button>
                    </div>
                </form>

            </div>
            <script>
                document.getElementById('loginForm').addEventListener('submit', function(e) {
                    e.preventDefault();

                    let username = document.getElementById('username').value;
                    let password = document.getElementById('password').value;
                    let cambioClave = document.getElementById('cambioClave').checked;


                    fetch('<?= base_url('/autentificar') ?>', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                username: username,
                                password: password
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Bienvenido',
                                    text: data.message
                                }).then(() => {
                                    if (cambioClave) {
                                        sessionStorage.setItem('username', username)
                                        window.location.href = '<?= base_url('/cambioClave') ?> ';

                                    } else {
                                        window.location.href = '<?= base_url('/') ?>';

                                    }
                                })

                            } else {
                                if (data.status === 'info') {
                                    Swal.fire({

                                            icon: 'info',
                                            title: 'info',
                                            text: data.message,
                                            showConfirmButton: true
                                        })
                                        .then(() => {
                                            window.location.href = '<?= base_url('/cambioClave') ?> ';
                                        })
                                } else {
                                    Swal.fire({

                                        icon: data.status,
                                        title: 'Ups Algo salio mal',
                                        text: data.message
                                    });
                                }


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