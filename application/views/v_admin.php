<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"  content="IE=edge">
        <meta name="viewport"               content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <meta name="description"            content="Benitan">
        <meta name="keywords"               content="Benitan">
        <meta name="robots"                 content="Index,Follow">
        <meta name="date"                   content="January 25, 2020"/>
        <meta name="language"               content="es">
        <meta name="theme-color"            content="#000000">
        <title>Benitan</title>
        <link rel="shortcut icon" href="<?php echo RUTA_IMG?>logo/favicon.png">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap-select/css/bootstrap-select.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>lato.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_CSS?>style.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet"    href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.bootstrap.min.css">
        <link rel="stylesheet"    href="<?php echo RUTA_CSS?>admin.css?v=<?php echo time();?>">
    </head>
    <body>
        <div class="jm-header jm-fixed">
            <div class="jm-header--left">
                <img src="<?php echo RUTA_IMG?>logo/benitan.gif">
                <span>benitan</span>
            </div>
            <div class="jm-header--right">
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-logout" onclick="cerrarCesion()">Logout</button> 
            </div>
        </div>
        <section class="jm-section">
            <div class="jm-container m-t-50">
                <ul class="nav nav-tabs m-b-20 jm-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#contact" aria-controls="contact" role="tab" data-toggle="tab">Contact</a></li>
                    <!-- <li role="presentation"><a href="#shared" aria-controls="shared" role="tab" data-toggle="tab">Shared</a></li> -->
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="contact">
                        <div class="mdl-card">
                            <div class="table-responsive">
                                <table id="exampleContact" class="display nowrap table table-bordered table-hover dt-responsive" cellspacing="0" width="100%">
                                    <thead>
                                        <tr class="tr-header-reporte">
                                            <th class="text-left">Name</th>
                                            <th class="text-left">Reach</th>
                                            <th class="text-left">Message</th>
                                            <th class="text-center">Registration date</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tablecity">
                                        <?php echo $html ?>  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jquery-1.11.2.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/bootstrap-select.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/i18n/defaults-es_ES.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.min.js?v=<?php echo time();?>"></script>
        <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.5/jszip.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>login.js?v=<?php echo time();?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#exampleContact').DataTable( {
                    searching : false,
                    responsive: true,
                    dom: 'Bfrtip',
                    aLengthMenu : [100],
                    buttons: [
                        {
                            extend:'excel',
                            text: 'Exportar a Excel'
                        },
                        {
                            extend:'print',
                            text: 'Imprimir'
                        }
                    ],
                    language : {
                        info : "Mostrando _TOTAL_ registros",
                    }
                });
                $('#exampleShared').DataTable( {
                    searching : false,
                    responsive: true,
                    dom: 'Bfrtip',
                    aLengthMenu : [100],
                    buttons: [
                        {
                            extend:'excel',
                            text: 'Exportar a Excel'
                        },
                        {
                            extend:'print',
                            text: 'Imprimir'
                        }
                    ],
                    language : {
                        info : "Mostrando _TOTAL_ registros",
                    }
                });
            });
        </script>
    </body>
</html>