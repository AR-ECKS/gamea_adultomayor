<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anuncios de Adultos Mayores Desaparecidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #fff;
        }

        /* Estilos del navbar */
        .navbar {
            background-color: #ffffff;
            /* Rojo */
        }

        .navbar-brand img {
            max-height: 40px;
            /* Ajustar tamaño del logo */
        }

        /* Estilos del parallax */
        .parallax {
            background-image: url('https://cdn.pixabay.com/photo/2017/02/14/17/50/hands-2066551_960_720.jpg');
            /* Imagen de fondo */
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            height: 90vh;
            /* Altura ajustable */
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
        }

        .parallax::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.1);
            /* Superposición oscura */
            filter: blur(10px);
            /* Aplica el efecto de desenfoque */

        }


h1{
   font-size: 5em;
   font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
   color: white!important;
   z-index: 99999;
}


        /* Estilos del card de anuncio */
        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-title {
            color: #333;
            font-size: 20px;
            font-weight: bold;
        }

        .card-text {
            color: #666;
        }


    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://www.elalto.gob.bo/wp-content/uploads/2022/09/logos-modificados-final-02-e1663769657614-300x63.png"
                    alt="Logo" width="150"> <!-- Agregar el logo -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-danger " href="#">Inicio</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-danger" href="#">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="{{ route('login') }}">Inicar Sesion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="parallax">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="mb-3 text-white">ANUNCIOS DE DESAPARECIDOS</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h2 class="mb-0 text-light">"Cuidemos a nuestros adultos mayores"</h2>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Anuncio de Desaparecido</h5>
                        <p class="card-text"><strong>Nombre:</strong> Juan Pérez</p>
                        <p class="card-text"><strong>Edad:</strong> 75 años</p>
                        <p class="card-text"><strong>Descripción:</strong> Juan Pérez fue visto por última vez el 15 de
                            marzo de 2024 en la zona de La Paz. Tiene cabello blanco y ojos marrones. Cualquier
                            información sobre su paradero, por favor contactar al número 123-456789.</p>
                        <button class="btn btn-primary">Compartir por WhatsApp</button>
                        <button class="btn btn-primary">Compartir por Facebook</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Anuncio de Desaparecido</h5>
                        <p class="card-text"><strong>Nombre:</strong> Juan Pérez</p>
                        <p class="card-text"><strong>Edad:</strong> 75 años</p>
                        <p class="card-text"><strong>Descripción:</strong> Juan Pérez fue visto por última vez el 15 de
                            marzo de 2024 en la zona de La Paz. Tiene cabello blanco y ojos marrones. Cualquier
                            información sobre su paradero, por favor contactar al número 123-456789.</p>
                        <button class="btn btn-primary">Compartir por WhatsApp</button>
                        <button class="btn btn-primary">Compartir por Facebook</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Anuncio de Desaparecido</h5>
                        <p class="card-text"><strong>Nombre:</strong> Juan Pérez</p>
                        <p class="card-text"><strong>Edad:</strong> 75 años</p>
                        <p class="card-text"><strong>Descripción:</strong> Juan Pérez fue visto por última vez el 15 de
                            marzo de 2024 en la zona de La Paz. Tiene cabello blanco y ojos marrones. Cualquier
                            información sobre su paradero, por favor contactar al número 123-456789.</p>
                        <button class="btn btn-primary">Compartir por WhatsApp</button>
                        <button class="btn btn-primary">Compartir por Facebook</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Anuncio de Desaparecido</h5>
                        <p class="card-text"><strong>Nombre:</strong> Juan Pérez</p>
                        <p class="card-text"><strong>Edad:</strong> 75 años</p>
                        <p class="card-text"><strong>Descripción:</strong> Juan Pérez fue visto por última vez el 15 de
                            marzo de 2024 en la zona de La Paz. Tiene cabello blanco y ojos marrones. Cualquier
                            información sobre su paradero, por favor contactar al número 123-456789.</p>
                        <button class="btn btn-primary">Compartir por WhatsApp</button>
                        <button class="btn btn-primary">Compartir por Facebook</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Anuncio de Desaparecido</h5>
                        <p class="card-text"><strong>Nombre:</strong> Juan Pérez</p>
                        <p class="card-text"><strong>Edad:</strong> 75 años</p>
                        <p class="card-text"><strong>Descripción:</strong> Juan Pérez fue visto por última vez el 15 de
                            marzo de 2024 en la zona de La Paz. Tiene cabello blanco y ojos marrones. Cualquier
                            información sobre su paradero, por favor contactar al número 123-456789.</p>
                        <button class="btn btn-primary">Compartir por WhatsApp</button>
                        <button class="btn btn-primary">Compartir por Facebook</button>
                    </div>
                </div>
            </div>
            <!-- Agregar más anuncios aquí -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
