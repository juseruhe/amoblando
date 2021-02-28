<!DOCTYPE html>
<html lang="en">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Amoblando - inicio</title>
<!--
Amoblando Template
http://www.templatemo.com/tm-466-cafe-house
-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Damion' rel='stylesheet' type='text/css'>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/templatemo-style.css" rel="stylesheet">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>
<!-- Preloader -->
<!--<div id="loader-wrapper">-->
<!--    <div id="loader"></div>-->
<!--    <div class="loader-section section-left"></div>-->
<!--    <div class="loader-section section-right"></div>-->
<!--</div>-->
<!-- End Preloader -->
<div class="tm-top-header">
    <div class="container">
        <div class="row">
            <div class="tm-top-header-inner">
                <div class="tm-logo-container">
                    <img src="img/House-Icon.png" alt="Logo" class="tm-site-logo">
                    <h1 class="tm-site-name tm-handwriting-font">-</h1>
                </div>
                <div class="mobile-menu-icon">
                    <i class="fa fa-bars"></i>
                </div>
                <nav class="tm-nav">
                    <ul>
                        <li><a href="index.php" class="active">Inicio</a></li>
                        <li><a href="category.php">Categoria</a></li>
                        <li><a href="product.php">Productos</a></li>
                        <li><a href="contact.php">Consultar compra</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<section class="tm-welcome-section">
  <div class="container tm-position-relative">




    <div class="row tm-welcome-content">
      <h2 class="white-text tm-handwriting-font tm-welcome-header"><img src="img/header-line.png" alt="Line" class="tm-header-line">&nbsp;Bienvenido&nbsp;&nbsp;<img src="img/header-line.png" alt="Line" class="tm-header-line"></h2>
      <br>

        <!--    INICIO SLIDER-->
        <style>
            * {box-sizing: border-box}
            body {font-family: Verdana, sans-serif; margin:0}
            .mySlides {display: none}
            img {vertical-align: middle;}

            /* Slideshow container */
            .slideshow-container {
              max-width: 1000px;
              position: relative;
              margin: auto;
            }

            /* Next & previous buttons */
            .prev, .next {
              cursor: pointer;
              position: absolute;
              top: 50%;
              width: auto;
              padding: 16px;
              margin-top: -22px;
              color: white;
              font-weight: bold;
              font-size: 18px;
              transition: 0.6s ease;
              border-radius: 0 3px 3px 0;
              user-select: none;
            }

            /* Position the "next button" to the right */
            .next {
              right: 0;
              border-radius: 3px 0 0 3px;
            }

            /* On hover, add a black background color with a little bit see-through */
            .prev:hover, .next:hover {
              background-color: rgba(0,0,0,0.8);
            }

            /* Caption text */
            .text {
              color: #f2f2f2;
              font-size: 15px;
              padding: 8px 12px;
              position: absolute;
              bottom: 8px;
              width: 100%;
              text-align: center;
            }

            /* Number text (1/3 etc) */
            .numbertext {
              color: #f2f2f2;
              font-size: 12px;
              padding: 8px 12px;
              position: absolute;
              top: 0;
            }

            /* The dots/bullets/indicators */
            .dot {
              cursor: pointer;
              height: 15px;
              width: 15px;
              margin: 0 2px;
              background-color: #bbb;
              border-radius: 50%;
              display: inline-block;
              transition: background-color 0.6s ease;
            }

            .active, .dot:hover {
              background-color: #717171;
            }

            /* Fading animation */
            .fade {
              -webkit-animation-name: fade;
              -webkit-animation-duration: 1.5s;
              animation-name: fade;
              animation-duration: 1.5s;
            }

            @-webkit-keyframes fade {
              from {opacity: .4}
              to {opacity: 1}
            }

            @keyframes fade {
              from {opacity: .4}
              to {opacity: 1}
            }

            /* On smaller screens, decrease text size */
            @media only screen and (max-width: 300px) {
              .prev, .next,.text {font-size: 11px}
            }
          </style>
        <!--CONTAINER-->
      <div class="slideshow-container">
        <div class="mySlides fade">
          <div class="numbertext">1 / 3</div>
          <img src="img/slider/slider-1.PNG" style="width:100%">
          <!--          <div class="text">Utimos dias</div>-->
        </div>
        <div class="mySlides fade">
          <div class="numbertext">2 / 3</div>
          <img src="img/slider/slider-2.PNG" style="width:100%">
          <!--          <div class="text">Ultimos dias</div>-->
        </div>

        <div class="mySlides fade">
          <div class="numbertext">3 / 3</div>
          <img src="img/slider/slider-3.PNG" style="width:100%">
          <!--          <div class="text">Ultimos dias</div>-->
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

      </div>
      <br>
        <!--SLIDE CONTENT-->
      <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
      </div>
        <!--SLIDE SCRIPTS-->
      <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
          showSlides(slideIndex += n);
        }

        function currentSlide(n) {
          showSlides(slideIndex = n);
        }

        function showSlides(n) {
          var i;
          var slides = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("dot");
          if (n > slides.length) {slideIndex = 1}
          if (n < 1) {slideIndex = slides.length}
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
          }
          for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";
          dots[slideIndex-1].className += " active";
        }
      </script>
      <!--    FIN SLIDER-->

      <a href="#main" class="tm-more-button tm-more-button-welcome">Detalles</a>
    </div>
  </div>
</section>

<div class="tm-main-section light-gray-bg">
  <div class="container" id="main">
    <section class="tm-section row">
      <div class="col-lg-9 col-md-9 col-sm-8">
        <h2 class="tm-section-header gold-text tm-handwriting-font">La mejor opción para tu hogar</h2>
        <h2>Amoblando</h2>
            <p class="tm-welcome-description">
              El diseño y calidad que tu hogar necesita, brindando un toque de naturaleza y
              ambiente ideal para la tranquilidad mental.
            </p>
        <a href="#" class="tm-more-button margin-top-30">Leer más</a>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-4 tm-welcome-img-container">
        <div class="inline-block shadow-img">
          <img src="img/1.jpg" alt="Image" class="img-circle img-thumbnail">
        </div>
      </div>
    </section>
    <section class="tm-section tm-section-margin-bottom-0 row">
      <div class="col-lg-12 tm-section-header-container">
        <h3 class="tm-section-header gold-text tm-handwriting-font"><img src="img/House-Icon.png" alt="Logo" class="tm-site-logo"> Populares</h3>
        <div class="tm-hr-container"><hr class="tm-hr"></div>
      </div>
      <div class="col-lg-12 tm-popular-items-container">
        <div class="tm-popular-item">
          <img src="img/popular-1.jpg" alt="Popular" class="tm-popular-item-img">
          <div class="tm-popular-item-description">
            <h3 class="tm-handwriting-font tm-popular-item-title"><span class="tm-handwriting-font bigger-first-letter">S</span>ofa en L</h3><hr class="tm-popular-item-hr">
            <p>Práctica sala compuesta por un sofá y una poltrona independiente que puede acomodar fácilmente de acuerdo a su espacio</p>
            <div class="order-now-container">
              <a href="#" class="order-now-link tm-handwriting-font">Comprar ahora</a>
            </div>
          </div>
        </div>
        <div class="tm-popular-item">
          <img src="img/popular-2.jpg" alt="Popular" class="tm-popular-item-img">
          <div class="tm-popular-item-description">
            <h3 class="tm-handwriting-font tm-popular-item-title"><span class="tm-handwriting-font bigger-first-letter">C</span>ama cabecero</h3><hr class="tm-popular-item-hr">
            <p>Práctica y moderna cama armable elaborada en madera TPM. Diseño en líneas rectas con finos acabados</p>
            <div class="order-now-container">
              <a href="#" class="order-now-link tm-handwriting-font">Comprar ahora</a>
            </div>
          </div>
        </div>
        <div class="tm-popular-item">
          <img src="img/popular-3.jpg" alt="Popular" class="tm-popular-item-img">
          <div class="tm-popular-item-description">
            <h3 class="tm-handwriting-font tm-popular-item-title"><span class="tm-handwriting-font bigger-first-letter">B</span>iffe</h3><hr class="tm-popular-item-hr">
            <p>El mueble combina lo mejor del diseño y la funcionalidad. Con gran capacidad de almacenamiento. Perfecto para tus espacios.</p>
            <div class="order-now-container">
              <a href="#" class="order-now-link tm-handwriting-font">Comprar ahora</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="tm-section row">
      <div class="col-lg-12 tm-section-header-container">
        <h2 class="tm-section-header gold-text tm-handwriting-font"><img src="img/House-Icon.png" alt="Logo" class="tm-site-logo"> Categoria</h2>
        <div class="tm-hr-container"><hr class="tm-hr"></div>
      </div>
      <div class="col-lg-12 tm-special-container margin-top-60">
        <div class="tm-special-container-left"> <!-- left -->
          <div class="tm-special-item">
            <div class="tm-special-img-container">
              <img src="img/productos/alcobas/camas/CAMA_ROMA_MICROFIBRA.PNG" alt="Special" class="tm-special-img img-responsive">
              <a href="#">
                <div class="tm-special-description">
                  <h3 class="tm-special-title">Alcobas</h3>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="tm-special-container-right"> <!-- right -->
          <div>
            <div class="tm-special-item">
              <div class="tm-special-img-container">
                <img src="img/productos/comedores/juego_de_comedor/JUEGO_DE_COMEDOR_DINA_4_PUESTOS.PNG" alt="Special" class="img-responsive">
                <a href="#">
                  <div class="tm-special-description">
                    <h3 class="tm-special-title">Comedores</h3>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="tm-special-container-lower">
            <div class="tm-special-item">
              <div class="tm-special-img-container">
                <img src="img/productos/sofas/SDFSDFSDF.jpg" alt="Special" class="img-responsive">
                <a href="#">
                  <div class="tm-special-description">
                    <p>Sofás</p>
                  </div>
                </a>
              </div>
            </div>
            <div class="tm-special-item">
              <div class="tm-special-img-container">
                <img src="img/productos/salas/sofa_l/SALA_MODULAR_SOFÍA_CUERO_SINTÉTICO.PNG" alt="Special" class="img-responsive">
                <a href="#">
                  <div class="tm-special-description">
                    <p>Salas</p>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="tm-section">
      <div class="row">
        <div class="col-lg-12 tm-section-header-container">
          <h2 class="tm-section-header gold-text tm-handwriting-font"><img src="img/House-Icon.png" alt=Logo" class="tm-site-logo"> Accesorios individuales</h2>
          <div class="tm-hr-container"><hr class="tm-hr"></div>
        </div>
      </div>
      <div class="row">
        <div class="tm-daily-menu-container margin-top-60">
          <div class="col-lg-4 col-md-4">
            <img src="img/menu-board.png" alt="Menu board" class="tm-daily-menu-img">
          </div>
          <div class="col-lg-8 col-md-8">
            <p>Contamos con la opción de que el cliente pueda comprar articulos individuales si asi lo requiere</p>
            <ol class="margin-top-30">
              <li>Almohada</li>
              <li>Silla</li>
              <li>Base cama</li>
              <li>Colchon</li>
              <li>Maecenas nec odio et ante tincidunt tempus.</li>
              <li>Donec vitae sapien ut libero ventenatis faucibus.</li>
            </ol>
            <a href="#" class="tm-more-button margin-top-30">Leer más</a>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<!-- JS -->
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
<script type="text/javascript" src="js/templatemo-script.js"></script>      <!-- Templatemo Script -->
</body>
</html>

<!--FOOTER-->
<?php
$PageTitle="Amoblando-2";
function customPageFooter(){?>
<?php }
include_once('layouts/footer.php');
?>
