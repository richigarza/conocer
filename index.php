<!DOCTYPE html>
<html lang="es">
  	<head>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
   		<title>conocer</title>

    	<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" />
<link rel="stylesheet" type="text/css" href="https://select2.github.io/select2-bootstrap-theme/css/select2-bootstrap.css">
    	<link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/datepicker.css" rel="stylesheet">
      <link href="src/css/nav.css" rel="stylesheet">

		<style>
		body {
			background-color: #f1f1f1;
		}
			.margin-panels {
				margin:10px;
			}
			.row {
				margin-bottom: 10px;
			}
			.navbar-default {
    			background-color: #3a3a3a;
   				border-color: #e7e7e7;
			}
      #login-panel{
          position: relative;
          width: 600px;
          margin: 30px auto;
      }
		</style>
  	</head>
  	<body>  
      
  		<nav class="navbar navbar-default" role="navigation">
			 <ul class="nav navbar-nav">
			 </ul>
				<img src="img/SEP_logo.png" style="margin-top: 15px;">
				<img src="img/conocer_logo.png" style="width: 230px;float:right; margin: 10px 0px 15px 15px;">      
		  </nav> 


      <?php 
      $page = $_GET["page"];
      switch ($page) {
        case 'main':
          echo '
      <div class="margin-panels">
        <ul id="navbar" class="nav nav-justified">
          <li id="registro" class="nav-menu active"><a class="tool" data-toggle="tooltip" title="Registra, edita o agrega nuevas visitas">Registro</a></li>
          <li id="reporte" class="nav-menu"><a class="tool" data-toggle="tooltip" title="Filtra y genera reportes">Reporte</a></li>
          <li id="estadisticas" class="nav-menu"><a class="tool" data-toggle="tooltip" title="Genera estadísticas con la información en la base de datos">Estadísticas</a></li>
          <li id="Monitoreo" class="nav-menu"><a class="tool" data-toggle="tooltip" title="Monitorea las visitas">Monitoreo</a></li>
        </ul>
      </div>
          ';
          echo "<div class='global-page page-registro'>";
          include("Forms/Registrar.php");
          include("Forms/Captura.php");
          include("Forms/Monitor.php");
          echo "</div>";
          echo "<div class='global-page page-reporte' style='display:none'>";
          include("Forms/Reporte.php");
          echo "</div>";
          echo "<div class='global-page page-estadisticas' style='display:none'>";
          include("Forms/Estadisticas.php");
          echo "</div>";
          echo "<div class='global-page page-Monitoreo' style='display:none'>";
          include("Forms/Monitoreo.php");
          echo "</div>";
        break;     
        default:
      ?>
      <div id="login-panel" class="panel panel-primary margin-panels">
        <div class="panel panel-heading">
          Login
        </div>
        <div class="panel panel-body">
          <div class="form-group row">
            <label class=" col-md-5" for="name"> Usuario: </label>
            <div class="col-md-5">
              <input type="text" id="user" name="user" class="form-control" placeholder="Usuario" maxlength="20">
            </div>
          </div>
          <div class="form-group row">
            <label class=" col-md-5" for="user"> Contraseña: </label>
            <div class="col-md-5">
              <input type="password" id="pass" name="pass" class="form-control" placeholder="Contraseña" maxlength="20">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-5">
              <input type="button" id="btnLogin" class="btn btn-lg btn-primary" value="Login">
            </div>
          </div>
        </div>
      </div>
      <?php
            break;
        }
        ?>      
    <!-- Modal -->
    <div id="myModal"class="modal fade" tabindex="-1" role="dialog" style="text-align:center;">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
                <h4 class="modal-title"></h4>
              </div>
              <div class="modal-body">

              </div>
              <div class="modal-footer">
                
              </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

		<!-- loading Modal -->
		<div id="myModalLoading"class="modal fade" tabindex="-1" role="dialog" style="text-align:center;">
  			<div class="modal-dialog" role="document">
    			<div class="modal-content">
      				<!--<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>	
        				<h4 class="modal-title">Modal title</h4>
      				</div>-->
      				<div class="modal-body">
                <div id="alertEstatus" role="alert" style="display: none;"></div>
      					<img src="img/loading.gif" style="width:150px; display: block; margin: 0 auto;"/>
        				<p>Cargando, espere un momento.</p>
      				</div>
      				<!--<div class="modal-footer">
        				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        				<button type="button" class="btn btn-primary">Save changes</button>
      				</div>-->
    			</div><!-- /.modal-content -->
  			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

    	<!-- Bootstrap -->
    	<script src="js/jquery-3.1.1.min.js"></script>	
    	<script src="js/bootstrap.min.js"></script>
      <script src="js/bootstrap-datepicker.js" type="text/javascript"></script>
      <script src="js/select2-4.0.3/dist/js/select2.full.min.js"></script>
      <script src="js/validate/jquery.validate.min.js"></script>
      <script src="https://code.highcharts.com/highcharts.js"></script>
      <script src="https://code.highcharts.com/modules/exporting.js"></script>

      <!-- CUSTOMS SCRIPTS-->
      <script src="src/js/Global.js"></script>
      <script src="src/js/Load_Page.js"></script>
      <script src="src/js/login.js"></script>
      <script src="src/js/Registrar.js"></script>
      <script src="src/js/Captura.js"></script>
      <script src="src/js/Monitor.js"></script>
      <script src="src/js/Reporte.js"></script>
      <script src="src/js/charts.js"></script>
      
	</body>
</html>