<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible"  content="IE=edge">
    <meta name="viewport"               content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="description"            content="Benitan">
    <meta name="keywords"               content="Benitan">
    <meta name="robots"                 content="Index,Follow">
    <meta name="date"                   content="August 01, 2018"/>
    <meta name="language"               content="es">
    <meta name="theme-color"            content="#000000">
	<title>Benitan</title>
    <link rel="shortcut icon" href="<?php echo RUTA_IMG?>logo/favicon.png">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap-select/css/bootstrap-select.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>futura.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_CSS?>style.css?v=<?php echo time();?>">
</head>
<body>
    <nav class="navbar navbar-default navbar-grey">
        <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="Home"><img src="<?php echo RUTA_IMG?>logo/benitan.png"><span>Benitan</span></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="Home">Home</a></li>
                <li><a href="Story">The Story</a></li>
                <li><a href="Home#about">About us</a></li>
                <li><a href="Design">The design</a></li>
                <li><a href="Collection">Collection</a></li>
                <li><a href="Home#shared">Share with us</a></li>
                <li><a href="Home#contact">Contact us</a></li>
            </ul>
        </div>
        </div>
    </nav>
    <section class="jm-section m-t-30 p-b-10" id="about">
        <div class="jm-container">
            <div class="jm-title">
                <h2>The Design</h2>
                <hr>
            </div>
        </div>
    </section>
    <section class="jm-white text-right">
        <div class="jm-container">
            <div class="jm-contenido scrollflow -slide-top -opacity">
                <img src="<?php echo RUTA_IMG?>fondo/hourglass.jpg" />
                <p>Look around you. How many people do you see looking down at their phones? Technology
                is useful, just don’t spend all your time glued to your phone. </p>
            </div>
        </div>
    </section>
    <section class="jm-relative">
        <div class="jm-fondo pulsera"></div>
        <div class="jm-container">
            <div class="jm-pulsera jm-flex"></div>
        </div>
    </section>
    <section class="jm-white text-right">
        <div class="jm-container">
            <div class="jm-contenido scrollflow -slide-top -opacity">
                <p>The Benitan bracelet is designed to serve as a reminder that the time we have is limited. Don't
                spend it staring at screen. Instead, go out, explore, meet new people, discover new places.</p>
                <img src="<?php echo RUTA_IMG?>logo/benitan_discover.png" />
                <p>Our clasp design is made to secure to your wrist and stay with you on land or in water. </p>
            </div>
        </div>
    </section>
    <footer>
        <div class="js-container text-center">
            <p class="content">&copy; Copyright 2018 Benitan – All Rights Reserved</p>
            <div class="jm-redes">
                <ul>
                    <li><a href="https://web.facebook.com/benitanweb?_rdc=1&_rdr" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://www.youtube.com/channel/UCY0175T5TjckuXn2rSxUuIg" target="_blank"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="https://www.instagram.com/benitanweb/?zr_mid=W_gRrQAEAAGF1beghemjMHT4VeX_&ctime=1544204691&rtime=1544204689&hrc=1" target="_blank"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </footer>
	<script src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>jquery-1.11.2.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>js-scroll-flow.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/bootstrap-select.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/i18n/defaults-es_ES.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>jsindex.js?v=<?php echo time();?>"></script>
    <script type="text/javascript">
        // var URLactual = window.location;
        // if(URLactual['href'] != 'http://www.marketinghpe.com/microsite/nsx_sddc/cr/'){
        //     location.href = 'http://www.marketinghpe.com/microsite/nsx_sddc/cr/';
        // }
    </script>
</body>
</html>