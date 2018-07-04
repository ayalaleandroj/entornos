<?php 
    if(session_start() == 1 && !empty($_SESSION['usuario']))
    {
        header("location: index.php");
    }
 ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Plataforma Virtual</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body style="background-image: \DSC_0006.JPG">
    <div class="col-md-6 col-sm-6 col-xs-12" style="margin-left: 25%;margin-top: 10%;">
        <div class="panel panel-danger">
                 <div class="panel-heading">
                    Iniciar Sesión
                 </div>
                 <div class="panel-body">
                     <form action="" method="POST" id="form-login" name="form-login">  
                        <div class="form-group">
                        <label>Nombre de Usuario</label>
                            <input class="form-control" type="text" name="usuario" required/>
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input class="form-control" type="password" name="password" required/>
                        </div>
                        <button type="submit" class="btn btn-danger">Ingresar</button>
                        <button type="button" class="btn btn-info" onclick="window.location='registrar.php'">Registrarse</button>
                        <div style="width: 100%; text-align: center; border:">
                            <img src="img/loader-black.gif" alt="" id="loader-carga" style="display: none;">
                            <div id="alert-login" class="alert alert-danger" role="alert" style="width: 50%; margin: 0 auto; margin-top: 10px; display: none;">El usuario o contraseña son incorrectos</div>
                        </div>
                    </form>
                 </div>
             </div>
         </div>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#form-login').on('submit',function(e){
                e.preventDefault();
                $.ajax({
                    url: 'login-code.php',
                    type: 'post',
                    data: $('#form-login').serialize(),
                    beforeSend: function(){     
                        $('#loader-carga').css('display','inline');
                    },
                    success: function(resp){
                        if (resp === '1')
                        {
                            window.location.href = "index.php";
                        }
                        else
                        {
                            $("#alert-login").css('display','block');
                        }
                        $('#loader-carga').css('display','none');
                    },
                    error: function(jqJHR, estado, error){
                        console.log(estado);
                        console.log(error);
                    }
                });
            }); 
        });
    </script>
    
    <!-- BOOTSTRAP SCRIPTS  -->
  
</body>
</html>

