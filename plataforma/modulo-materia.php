<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Plataforma TICS</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
<?php 
include('php/temas-funciones.php');
?>
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
                <a href="#" class="btn btn-danger pull-right">Salir</a>
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
                        </ul>                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
     <!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
            <?php if (isset($_SESSION['usuario'])) { ?>
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Carrera: Lic. en TICs</h4>
                
                            </div>

        </div>
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Entornos Virtuales de Enseñanza y Aprendizaje
                    </div>
                    <div class="panel-body">
                        <p>Descripción clase</p>
                    </div>
                    <div class="panel-footer">
                        Profesores: 
                    </div>
                </div>
            </div>
           <div class="row">
                
                <div class="col-md-4 col-sm-4">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Contenido
                        </div>
                        <div class="panel-body">
                            <ul>
                                <li>Trabajos Prácticos</li>
                                    <ul>
                                        <li><a href="">Trabajo Prático Nº1</a></li>
                                        <li><a href="">Actividad de Investigación</a></li>
                                    </ul>
                                <li>Noticias</li>
                                <li>Apuntes</li>
                                <li>Notas de Exámenes</li>
                                <li>Bibliografía</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="row">
                        <div class="panel panel-default" style="width: 760px;">
                            <div class="panel-heading">
                                Título Tema 16/06/2018
                            </div>
                            <div class="panel-body">
                                <center><h2>Trabajo Práctico Nº1</h2></center>
                                <br/>
                                1) Desarrollar un entorno virtual web.<br/>
                                2) Investigar sobre los entornos virtuales Chamiloy y Moddle.<br/>
                            </div>
                            <div class="panel-footer">
                                Profesor
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="panel panel-info" style="width: 760px;">
                            <div class="panel-heading">
                                Comentarios
                            </div>
                            <div class="panel panel-default" style="margin: 20px; width: 730px;">
                                    <div class="panel-heading">
                                    Caro
                                    </div>
                                    <div class="panel-body">
                                        Esta tarea no me gusta
                                    </div>
                            </div>
                            <div class="panel panel-default" style="margin: 20px; width: 730px;">
                                    <div class="panel-heading">
                                    Fede   
                                    </div>
                                    <div class="panel-body">
                                        A mi si me gusta
                                    </div>
                            </div>
  
                            <div class="form-group" style="width: 750px; margin: 5px;">
                                <label>Ingresar Comentario</label>
                                <input class="form-control" type="text" style="min-height:100px;" /><br/>
                                <button type="submit" class="btn btn-success">Enviar Comentario</button>
                            </div>
                                       
                        </div>
                    </div>  
                    <div class="row">
                        
                    </div>

                    </div>    
                </div>
            </div>
        <?php } else { echo "Para ver el contenido debe estar registrado e inscripto a la clase"; }?>
    </div>
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
