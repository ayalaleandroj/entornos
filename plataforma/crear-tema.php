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
    <title>Crear Nuevo Tema</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

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
                           
                           <?php if (isset($_SESSION['perfil'])) {?>
                            <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown">Mis Materias <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="ui.html">Materia1</a></li>
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Materia2</a></li>
                                </ul>
                            </li>
                            <li>
                              <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown">Mis Carreras <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="ui.html">Carrera1</a></li>
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Carrera2</a></li>
                                </ul>
                            </li>
                            <?php } else { ?>
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
                <h4 class="header-line">Nuevo Tema</h4>
                
                            </div>

        </div>
        <form id="usuario" action="prueba.php" method="post">
             <div class="row">
               <div class="panel panel-info">
                        <div class="panel-body">
                            <!--<form role="form">-->
                                        <div class="form-group">
                                            <label>Título</label>
                                            <input style="width: 600px;" name="nombre" class="form-control" type="text" />
                                        </div>
                                        <div class="form-group">
                                            <label>Clase de Tema</label>
                                            <select style="width: 600px;" name="tipotema" class="form-control">
                                                <option value="Trabajo">Trabajo Práctico</option>
                                                <option value="Apuntes">Apuntes</option>
                                                <option value="Nota">Notas de Exámen</option>
                                                <option value="Bibliografía">Bibliografía</option>
                                                <option value="Noticias">Noticias</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Materia</label>
                                            <select style="width: 600px;" name="materia" class="form-control">
                                                <option value="1">Entornos Virtuales</option>
                                                <option value="2">Análisis y Diseño de Sistemas</option>
                                                <option value="3">Matemática II</option>
                                                <option value="4">Redes y Telecomunicaciones</option>
                                                <option value="5">Programación IV</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Contenido</label>
                                            <textarea style="width: 900px;" class="form-control" rows="20"></textarea>
                                        </div>
                                  
                                 
                                       
                                        <button type="submit" class="btn btn-info">Publicar Tema</button>

                                    <!--</form>-->
                            </div>
                        </div>
                            </div>
    </form>
             
    
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
