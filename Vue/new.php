<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>New Compte</title>

	 <meta name="viewport" content="width-device-width, initial-scale=l">
        <link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7/dist/css/bootstrap.min.css">
        <script rel="stylesheet" type="text/css" href="../bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
      <script rel="stylesheet" type="text/css" src="../bootstrap-3.3.7/dist/js/jquery-3.4.1.min.js"></script>
      <script rel="stylesheet" type="text/css" src="../bootstrap-3.3.7/dist/js/jquery-3.4.1.js"></script>
</head>
<style type="text/css">

		input[type="password"],input[type="text"], {
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
	<div class=" row container"style="border:1px solid pink; padding:160px;">
		<form class="" method="Post" action="../Controller/controller.php">
				<div class="box">
				<fieldset style="border: 2px solid #1b6ec2;box-shadow: 10px;background-color:#f5f7f9;border-radius: 10px" class="shadow-sm p-3 mb-5 bg-white">
					<div  class="form-row" style="padding: 10px;  ">
						<legend style="background-color: #1b6ec2;border: 1px solid wheat;border-radius: 10px 10px 0px 0px;color: white;font-family: 'Constantia'; text-align: center;">
							Ajouter un Collaborateur
						</legend>
						<div class="form-group col-md-4">
							<label for="nom">Nom</label>
							<input type="text" name="nom" class="form-control" required >
						</div>
						<div class="form-group col-md-4">
							<label for="first">Prenom</label>
							<input type="text" name="prenom" class="form-control" required >
						</div>
						<div class="form-group col-md-4">
							<label for="matricule">Numéro CNI</label>
							<input type="text" name="matricule" class="form-control" required>
						</div>
						<div class="form-group col-md-6">
							<label for="mail">E-mail</label>
							<input type="mail" name="mail" class="form-control" required >
						</div>
						<div class="form-group col-md-6">
							<label for="tel">Téléphone</label>
							<input type="tel" name="tel" class="form-control" required >
						</div>					
						<div class="form-group col-md-6">
							<label for="choix_profils">Profil</label>
							<input list="profils" name='profil' type="text" id="choix_profils" class="form-control">
							<?php
				
								include_once('../Model/Dao_Profil.php');
								$requette = new Dao_Profil();
								$var = $requette->selectProfil();							
			 					foreach ($var as $key => $vars)		
								{
							?>
							<datalist id="profils" name='Idprofil'>	
				  				<option value="" ><?php ECHO $var[$key]['designation'] ;?></option>				  
							<?php
				  				}
				  			?>
							</datalist>
							
						</div>
					
						<div class="form-group col-md-6">
							<label for="choix_fonctions">Fonction</label>
							<input list="fonctions" type="text"  name="fonction" id="choix_fonctions" class="form-control">
							<?php
				
								include_once('../Model/Dao_Fonction.php');
								$requette = new Dao_F();
								$var = $requette->selectFonction();	
 								foreach ($var as $key => $vars)		
								{
							?>
							<datalist id="fonctions">
				
				 				 <option  name="fonction" value="<?php ECHO $var[$key]['designation'] ;?>"> 
							<?php
				  				}
				  			?>
							</datalist>
							
						</div>
						<div class="form-group col-md-6">
							<label for="choix_fonctions">Fonction</label>
							<input list="fonctions" type="text"  name="fonction" id="choix_fonctions" class="form-control">
							
							<select id="fonctions" name="fct">
				<?php
				
								include_once('../Model/Dao_Fonction.php');
								$requette = new Dao_F();
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
						<div class="form-group col-md-6">
							<label for="password">Mot de Passe</label>
							<input type="password" name="password" class="form-control">
						</div>
						<div class="form-group col-md-6">
							<label for="password1">Confirm Your Password</label>
							<input type="password" name="password1" class="form-control">
						</div>
						<div style="color: red; font-weight: bold; font-size:1.3em; text-align: center;">
							<?php
								echo @$_GET['message'] ;
					
							?>
						</div>
						<div class="form-group col-lg-5">
							<a href="accueil.html" ><input type="submit" value="Créer "name=""></a>
						</div>
						<div class="form-group col-lg-2">
							
						</div>
						<div class="form-group col-lg-5">
							<a href="accueil.html" ><input type="reset" value="Annuler "name="" ></a>
							
						</div>

						<div>
							<a href="connect.html "> Logn In<a/><br/>
							<a href="forget your password ">forget your password?<a/>
						</div>
					</div>
				</fieldset>
			</div>
		</form>
	</div>
</body>
        <script src="../bootstrap-3.3.7/js/tests/vendor/jquery.min.js"></script>
<script src="../bootstrap-3.3.7/js/transition.js"></script>
<script src="../bootstrap-3.3.7/js/dropdown.js"></script>
<script src="../bootstrap-3.3.7/js/collapse.js"></script>
<script src="../bootstrap-3.3.7/js/tooltip.js"></script>
<script src="../bootstrap-3.3.7/js/modal.js"></script>
<script src="../bootstrap-3.3.7/js/scrollspy.js"></script>
</html>