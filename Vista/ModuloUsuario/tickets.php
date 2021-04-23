<?php

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoCliente.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoCliente::setConexionBD($conexion);

$cod_cliente  =  $_SESSION['cod_cliente'];
//echo $cod_cliente;
$cliente = ManejoCliente::consultarCliente($cod_cliente);

?>

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

        <!-- Slide 1 -->
        <div class="carousel-item active">
            <div class="carousel-container">
                <h2 class="animate__animated animate__fadeInDown">BIENVENIDO A SUS<span> TICKETS: <?php echo $cliente->getNom_cliente() ?>

                        <!--AQUI VA CONEXION BD LLAMAR AL NOMBRE CLIENTE-->
                    </span></h2>

            </div>
        </div>
    </div>
</section><!-- End Hero -->

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="?menu=index"><i class="fa fa-angle-double-left" aria-hidden="true">Volver al inicio</i></a></li>
        </ol>
        <h2>Mis tickets</h2>

    </div>
</section><!-- End Breadcrumbs -->


<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>TICKETS</h2>
        </div>

        <div class="row mt-1 d-flex justify-content-end" data-aos="fade-right" data-aos-delay="100">

            <div class="col-lg-5">
                <div class="info">
                    <div class="address">
                        <i class="bi bi-geo-alt"></i>
                        <h4>Locación:</h4>
                        <p>Colombia</p>
                    </div>

                    <div class="email">
                        <i class="bi bi-envelope"></i>
                        <h4>Email:</h4>
                        <p>chibchaweb_ueb@gmail.com</p>
                    </div>

                    <div class="phone">
                        <i class="bi bi-phone"></i>
                        <h4>Teléfono:</h4>
                        <p>+57 304 436 6165</p>
                    </div>

                </div>

            </div>

            <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="100">
                <form action="ModuloUsuario/creaTicket.php?cod_cliente=<?php echo $cliente->getCod_cliente() ?>" method="post">
                    <div class="row">
                        <div class="form-group mt-3">
                            <select name="nombreTicket" id="nombreTicket" class="form-control">
                                <option class="form-control">Ingrese una opción</option>
                                <option class="form-control">Cambio de plan de pago</option>
                                <option class="form-control">Cambio de paquete</option>
                                <option class="form-control">Cambio de distribuidor</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <textarea class="form-control" name="descripcion" rows="5" placeholder="Descripción del ticket" required></textarea>
                    </div>
                    <div class="text-center">
                        <br>
                        <button class="btn btn-outline-success" type="submit">Subir ticket</button>

                    </div>

                </form>

            </div>

        </div>

    </div>
</section><!-- End Contact Section -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>HISTORIAL DE TICKETS</h2>
        </div>

        <div class="row mt-1 d-flex justify-content-end" data-aos="fade-right" data-aos-delay="100">

            <div class="col-lg-5">
                <div class="info">
                    <div class="address">
                        <i class="bi bi-geo-alt"></i>
                        <h4>Locación:</h4>
                        <p>Sugamuxi</p>
                    </div>

                    <div class="email">
                        <i class="bi bi-envelope"></i>
                        <h4>Email:</h4>
                        <p>chibchaweb_ueb@gmail.com</p>
                    </div>

                    <div class="phone">
                        <i class="bi bi-phone"></i>
                        <h4>Teléfono:</h4>
                        <p>+57 304 436 6165</p>
                    </div>

                </div>

            </div>

            <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="100">

                <form action="ModuloUsuario/creaTicket.php?cod_cliente=<?php echo $cliente->getCod_cliente() ?>" method="post" role="form" class="php-email-form">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" required>
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto" required>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="message" rows="5" placeholder="Mensaje" required></textarea>
                    </div>
                    <div class="my-3">
                        <div class="loading">Cargando...</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Tu mensaje ha sido enviado. Gracias!</div>
                    </div>
                    <div class="text-center"><button type="submit">Enviar mensaje</button></div>
                </form>

            </div>

        </div>

    </div>
</section><!-- End Contact Section -->