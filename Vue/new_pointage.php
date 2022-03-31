<?php 
	// session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>New Compte</title>

	 <meta name="viewport" content="width-device-width, initial-scale=l">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7/dist/css/bootstrap.min.css">
        <script rel="stylesheet" type="text/css" href="../bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
      <script rel="stylesheet" type="text/css" src="../bootstrap-3.3.7/dist/js/jquery-3.4.1.min.js"></script>
      <script rel="stylesheet" type="text/css" src="../bootstrap-3.3.7/dist/js/jquery-3.4.1.js"></script>
</head>
<style type="text/css">

		input[type="password"],input[type="text"] {
			  border:none;
			border-bottom: 1px solid #fff ;
			background:transparent
			/*height: 300px;*/
			color:#000;
			font-size: 16px;
			/*width: 235px;*/
			margin-bottom: 20px;
			border-radius: 6px;
		}
		select
		{
			height:50px;
			border:none;
			border-bottom: 1px solid #fff ;
			background:transparent
			/*height: 300px;*/
			color:#000;
			font-size: 16px;
			/*width: 235px;*/
			margin-bottom: 20px;
			border-radius: 6px;
		}
		input[type="submit"],input[type="reset"]{
			margin: 15px;
			color: #fff;
			background-color:#1b6ec2 ;
			border-radius: 15px;
			border: none;
			width: 100px;
			height: 34px;
		/*margin-left:60px; 
		font-size: 1.5em;*/
		}
		input[type="submit"]:hover{
		  background-color: rgb(240,13,29);
		  color: #fff;
		  font-family: 

		}
		input[type="reset"]:hover
		{
			 background-color: rgb(240,13,29);
		  	color: #fff;
		  	font-family: 
		}
		a{
		  text-decoration: none;
			padding: 10px 0px 20px ;
		  color:#1b6ec2;
		}
		a:hover{
		  color: red;
		}
		a:active{
		  color: red;
		}
		a{
		  text-decoration:none;
		}
		.box
		{
			width: 400px;
		}
</style>
<body>

	<?php 
		include_once('entete.php');
		include_once('../Model/Dao_Collaborateurs.php');
  		include_once('../Model/Dao_Pointage.php');
	  //collaborateurs
	  $requette = new Dao_C();
	  $requette->setNom($_SESSION['nom']);
	  $id = $requette->selectId();

	  //Pointage
	  $pointage = new Dao_Pointage();
	  $pointage->setId_collaborateur($id[0]['id_collaborateur']);
	  $Verify = $pointage->Verify();
	  // echo $Verify[0]['heure_begin'];
			$_SESSION['id_collaborateur'] = @$id[0]['id_collaborateur'];
			
			//verifier que l'utilisateur est connec
			
		?>


	<div class="container-fluid" style="padding: 90px;">
		<div class="col-md-4">
				<form class="" method="Post" action="../Controller/controller_pointage.php">
				<div class="box">
				<fieldset style="border: 2px solid #1b6ec2;box-shadow: 10px;background-color:#f5f7f9;border-radius: 10px" class="shadow-sm p-3 mb-5 bg-white">
					<div  class="form-row" style="padding: 10px;  ">
						<legend style="background-color: #1b6ec2;border: 1px solid wheat;border-radius: 10px 10px 0px 0px;color: white;font-family: 'Constantia'; text-align: center;">
							Emarger
						</legend>
						<?php
						if ($Verify == null ) {
							?>
						<div> Veuilleez vous connecter à nouveau !</div>
						<div class="form-group col-lg-5">
							<a href="../index.php" >Se connecter</a>	
						</div>
						<?php
				
							}
							else
							{
						?>
						<?php
							if (@$Verify[0]['heure_begin']==null) {
						?>
							<div> <label>Arrivée</label></div>
							<div class="col-md-2"></div>
							<div class="form-group col-md-8">
								<label for="begin">Heure d'arrivée</label>
								<input type="time" name="begin" class="form-control" required >
							</div>
							<div class="col-md-2"></div>
							<!-- <div class="form-group col-md-4">
								<label for="end">Heure de départ</label>
								<input type="time" name="end" class="form-control" disabled >
							</div>	 -->								
							<div style="color: red; font-weight: bold; font-size:1.3em; text-align: center;">
								<?php
									echo @$_GET['message'] ;
						
								?>
							</div>
						<?php
								$_SESSION['action']="debut";
							}
							else
							{
						?>
							<div> <label>Départ</label></div>
							<!-- <div class="form-group col-md-4">
								<label for="begin">Heure d'arrivée</label>
								<input type="time" name="begin" class="form-control" disabled >
							</div> -->
							<div class="col-md-2"></div>
							<div class="form-group col-md-8">
								<label for="end">Heure de départ</label>
								<input type="time" name="end" class="form-control" required >
							</div>				
							<div class="col-md-2"></div>					
							<div style="color: red; font-weight: bold; font-size:1.3em; text-align: center;">
								<?php
									echo @$_GET['message'] ;
						
								?>
							</div>
						<?php
								$_SESSION['action']="fin";
							}
						?>
						
						<div class="form-group col-lg-4">
							<a href="accueil.html" ><input type="submit" value="ok "name=""></a>
						</div>
						<div class="col-md-2"></div>
						<div class="form-group col-lg-4">
							<a href="accueil.html" ><input type="reset" value="Annuler "name="" ></a>	
						</div>
						<?php
							
						}
						?>
						<!-- <div>
							<a href="connect.html "> Logn In<a/><br/>
							<a href="forget your password ">forget your password?<a/>
						</div> -->
					</div>
				</fieldset>
			</div>
		</form>
		</div>
		<div class="col-lg-8">
			<div class="form">
				<!-- 	<div class="panel-group d-flex p-2 mb-4" id="accordion"style="padding:50px; background-color:white; border:1px solid white;">
	    <div class="panel panel-default">
	      <div class="panel-heading">
	        <h4 class="panel-title">
	        	<a class=""role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
	           Autre Action
	        
	        </h4>
	      </div>
	      <div id="collapseOne" class="panel-collapse collapse">
	        <div class="panel-body" >
					<label>Autre action</label>

			</div>
		  </div>
			</div></div> -->
			<div class="form-group col-md-5">
				
				<select  name="option" class="form-select col-md-4">
					<option>Pause</option>
					<option>Commission</option>
					<option>Permission</option>
				</select><label  for="option">Deplacement</label>
			</div>
			<div class="form-group col-md-7">
				<label for="text">Commentaire</label>
				<textarea name="text" class="form-group col-md-8"></textarea>
			</div>
			
		</div>
		
	</div>
	<?php include_once('footer.php');?>
</body>
        <script src="../bootstrap-3.3.7/js/tests/vendor/jquery.min.js"></script>
<script src="../bootstrap-3.3.7/js/transition.js"></script>
<script src="../bootstrap-3.3.7/js/dropdown.js"></script>
<script src="../bootstrap-3.3.7/js/collapse.js"></script>
<script src="../bootstrap-3.3.7/js/tooltip.js"></script>
<script src="../bootstrap-3.3.7/js/modal.js"></script>
<script src="../bootstrap-3.3.7/js/scrollspy.js"></script>
</html>