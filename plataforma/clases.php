﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Clases</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style type="text/css">
        .centro-ins {
            text-align: center;
        }
    </style>
</head>
<?php 
include("php/temas-funciones.php");
?>

<body>
    <div class="navbar navbar-inverse set-radius-zero" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">

                    <img src="assets/img/logo.png" />
                </a>

            </div>

	        <div class="right-div">
            	<?php if (isset($_SESSION['usuario'])) { 
            		echo "<div class='usuario'>".$_SESSION['usuario']."</div>";
            	?>
            	<div class="usuario">
                	<a href="destroy.php" class="btn btn-danger pull-right">Salir</a>
            	</div>
                <?php } else { ?>
                	<a href="login.php" class="btn btn-info">Iniciar Sesión</a>
                <?php } ?>
            </div>

        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="index.php" class="menu-top-active">Inicio</a></li>
                            <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown">Clases<i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <?php cargarCarreras(); ?>
                                </ul>
                            </li>
                            <?php if (!(isset($_SESSION['perfil']))) { ?>
                            <li><a href="alta-usuarios.php" class="menu-top-active">Registrarse</a></li>
                            <?php } if ($_SESSION['perfil'] == "Admin") { ?>
                            <li>
                              <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown">Gestión de Datos <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="alta-usuarios.php">Registro de Usuarios</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="buscar-usuarios.php">Buscar Usuarios</a></li>
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="abm-materias.php">Materias</a></li>
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="abm-carreras.php">Carreras</a></li>
                                </ul>
                            </li>
                            <?php } ?>
                            <?php if($_SESSION['perfil'] == "Admin" OR $_SESSION['perfil'] == "Profesor") {
                                ?>
                            <li>
                              <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown">Gestión de Temas <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="crear-tema.php">Nuevo Tema</a></li>
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="mis-temas.php">Mis Temas</a></li>
                                </ul>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
     <!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line"><?php echo obtenerTitulo($_GET['idcarrera']); ?></h4>
                
                            </div>

        </div>
        <!--   Kitchen Sink -->
        		    <div class="panel panel-info">
                        <div class="panel-heading">
                            Primer Año
                        </div>
                        <div class="panel-body">
                        	<div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre Materia</th>
                                            <th>Inscripción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php obtenerMaterias($_GET['idcarrera'], 1); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Segundo Año
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre Materia</th>
                                            <th>Inscripción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php obtenerMaterias($_GET['idcarrera'], 2); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Tercer Año
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre Materia</th>
                                            <th>Inscripción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php obtenerMaterias($_GET['idcarrera'], 3); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Cuarto Año
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre Materia</th>
                                            <th>Inscripción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php obtenerMaterias($_GET['idcarrera'], 4); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Quinto Año
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre Materia</th>
                                            <th>Inscripción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php obtenerMaterias($_GET['idcarrera'], 5); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->     
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
    <section class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                   &copy; 2014 Yourdomain.com |<a href="http://www.binarytheme.com/" target="_blank"  > Designed by : binarytheme.com</a> 
                </div>

            </div>
        </div>
    </section>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
