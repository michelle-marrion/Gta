<?php
	// session_start();
		// $id = $_SESSION['id_collaborateur'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Modifier Compte</title>

	 <meta name="viewport" content="width-device-width, initial-scale=l">
        <link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7/dist/css/bootstrap.min.css">
        <script rel="stylesheet" type="text/css" href="../bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
      <script rel="stylesheet" type="text/css" src="../bootstrap-3.3.7/dist/js/jquery-3.4.1.min.js"></script>
      <script rel="stylesheet" type="text/css" src="../bootstrap-3.3.7/dist/js/jquery-3.4.1.js"></script>
</head>
<style type="text/css">

		input[type="password"],input[type="text"],input[type="tel"],input[type="mail"] {
			  border:none;
			border-bottom: 1px solid #fff ;
			background:transparent;
			background-color: #CBD2EC;
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
			background-color:#254AA2 ;
			border-radius: 15px;
			border: none;
			width: 150px;
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
			width: 800px;
		}
</style>
<body>

	<?php 
		include_once('entete.php');
		
	?>
	
	<div class=" row container"style="padding:30px;">
		<form class="col-lg-offset-3 col-lg-6 col-lg-offset-3" method="POST" action="../Controller/controller_user.php">
				<div class="box">
				<fieldset style="border: 2px solid #254AA2;box-shadow: 10px;background-color:white;border-radius: 10px" class="shadow-sm p-3 mb-5 bg-white">
					<div  class="form-row" style="padding: 10px;  ">
						<legend style="background-color: #254AA2;border: 1px solid wheat;border-radius: 10px 10px 0px 0px;color: white;font-family: 'Constantia'; text-align: center;">
							Modifier Collaborateus
						</legend>
						<div>
							<?PHP
								// echo @$_SESSION['id_collaborateur'];
							?>
						</div>
						<div class="form-group col-md-4">
							<label for="nom">Nom</label>
							<input type="text" name="nom" class="form-control" value="<?php echo @$_SESSION['nom_user']?>"  >
						</div>
						<div class="form-group col-md-4">
							<label for="first">Prenom</label>
							<input type="text" name="prenom" class="form-control" value="<?php echo @$_SESSION['prenom']?>"  >
						</div>
						<div class="form-group col-md-4">
							<label for="matricule">Num??ro CNI</label>
							<input type="text" name="matricule" class="form-control" value="" disabled>
						</div>
						<div class="form-group col-md-6">
							<label for="mail">E-mail</label>
							<input type="mail" name="mail" class="form-control" value="<?php echo @$_SESSION['mail']?>"  >
						</div>
						<div class="form-group col-md-6">
							<label for="tel">T??l??phone</label>
							<input type="tel" name="tel" class="form-control"  value="<?php echo @$_SESSION['tel']?>" >
						</div>					
						<div class="form-group col-md-6">
							<div>
								<label for="choix_profils">Profil</label>
							</div>
							<!-- <input list="profils" name='profil' type="text" id="choix_profils" class="form-control"  >	 -->
							<div class="col-md-10">
							<select id="profils" name='profil' class="form-control"value="<?php echo @$_SESSION['profil']?>">	
								<?php
				
									include_once('../Model/Dao_Profil.php');
									$requette = new Dao_Profil();
									$var = $requette->selectProfil();							
				 					foreach ($var as $key => $vars)		
									{
								?>
				  				<option value="<?php ECHO $var[$key]['id_profil'] ;?>" ><?php ECHO $var[$key]['designation'] ;?></option>				  
								<?php
					  				}
					  			?>
							</select>
							</div>
							<div class="col-md-2">
								<a href="new_profil.php"><span class="glyphicon glyphicon-plus"></span></a>
							</div>						
						</div>
						<div class="form-group col-md-6">
							<div>
								<label for="choix_fonctions">Fonction</label>
							</div>
							<div class="col-md-10">
							<select id="fonctions" name="fonction" class="form-control">
								<!-- <option name="fonction" value=""><?php 
								// echo @$_SESSION['fonction']?></option> -->
							<?php
				
								include_once('../Model/Dao_Fonction.php');
								$requette = new Dao_Fonction();
								$var = $requette->selectFonction();	
 								foreach ($var as $key => $vars)		
								{
							?>
				 				 <option  name="fonction" value="<?php ECHO $var[$key]['id_fonction'] ;?>"><?php ECHO $var[$key]['designation'] ;?></option> 
							<?php
				  				}
				  			?>
							</select>
							</div>
							<div class="col-md-2">
								<a href="new_fonction.php"><span class="glyphicon glyphicon-plus"></span></a>
							</div>

							
						</div>
						<div class="form-group col-md-12">
							<label for="password">Mot de Passe</label>
							<input type="password" name="password" class="form-control" value="<?php echo @$_SESSION['password']?>" >
						</div>

						<!-- <div class="form-group col-md-6">
							<label for="password1">Confirm Your Password</label>
							<input type="password" name="password1" class="form-control">
						</div> -->
						<div style="color: red; font-weight: bold; font-size:1.3em; text-align: center;">
							<?php
								echo @$_GET['message'] ;
					
							?>
						</div>
						<div class="form-group col-lg-5">
							<input type="submit" value="Modifier" name="submit">
						</div>
						<div class="form-group col-lg-5">
							<a href="delete_user.php"><input type="reset" value="Supprimer" name="submit"></a>
						</div>				
					</div>
				</fieldset>
			</div>
		</form>
	</div>
	<?php
	include_once('return.php');
?>
</body>
<script src="../bootstrap-3.3.7/js/tests/vendor/jquery.min.js"></script>
<script src="../bootstrap-3.3.7/js/transition.js"></script>
<script src="../bootstrap-3.3.7/js/dropdown.js"></script>
<script src="../bootstrap-3.3.7/js/collapse.js"></script>
<script src="../bootstrap-3.3.7/js/tooltip.js"></script>
<script src="../bootstrap-3.3.7/js/modal.js"></script>
<script src="../bootstrap-3.3.7/js/scrollspy.js"></script>
</html>