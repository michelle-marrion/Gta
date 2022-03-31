<?php
	@session_start();
	include_once('../Model/Dao_Pointage.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Détails Compte</title>

	 <meta name="viewport" content="width-device-width, initial-scale=l">
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
		input[type="submit"],input[type="button"]{
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
		body
		{
			/*position: absolute;*/
		}
</style>
<body>

	<?php 
		include_once('entete.php');
		
	?>
	
	<div class="container_fluid"style="padding:100px; float: left;">
		<div class="col-md-6">
			<h1>Details</h1>
			<div>

			    <h4>Utilisateur</h4>
			    <hr />
			    <dl class="row">
			        <dt class = "col-sm-3">
			           Nom:
			        </dt>
			        <jj class = "col-sm-9">
			           <?php echo @$_GET['nom']?>
			        </jj>
			        <dt class = "col-sm-3">
			           Prenom:
			        </dt>
			        <jj class = "col-sm-9">
			           <?php echo @$_GET['prenom']?>
			        </jj>
			        <dt class = "col-sm-3">   
			            E-mail :
			        </dt>
			        <jj class = "col-sm-9">
			            <?php echo @$_GET['mail']?>
			        </jj>
			        <dt class = "col-sm-3">
			            Mot de passe :
			        </dt>
			        <jj class = "col-sm-9">
			           <?php echo @$_GET['password']?>
			        </jj>
			        <dt class = "col-sm-3"> 
			            Adresse:
			        </dt>
			        <jj class = "col-sm-9">
			            <?php echo @$_GET['tel']?>
			        </jj>
			        <dt class = "col-sm-3">
			            Profil:            
			        </dt>
			        <jj class = "col-sm-9">
			            <?php echo @$_GET['profil']?>
			        </jj>
			         <dt class = "col-sm-3">
			            Fonction:            
			        </dt>
			        <jj class = "col-sm-9">
			            <?php echo @$_GET['fonction']?>
			        </jj>
			    </dl>
			</div>
		    <div>
		    	<a href="edit_user.php">Modifier</a> | 
		    	<?php
					include_once('return.php');
				?>
			</div>
    
	<?php
		$_SESSION['id_collaborateur'] = $_GET['id'];
		$_SESSION['nom_user'] = $_GET['nom'];
		$_SESSION['prenom'] = $_GET['prenom'];
		$_SESSION['mail'] = $_GET['mail'];
		$_SESSION['tel'] = $_GET['tel'];
		$_SESSION['profil'] = $_GET['profil'];
		$_SESSION['fonction'] = $_GET['fonction'];
		$_SESSION['password'] = $_GET['password'];
	?>
		</div>
		<div class="col-md-6" style="height: 500px ;overflow: auto;">
			<style>
   
    h1 {
        font-family:'Goudy Old Style';
        /*'Docktrin' ;*/
    }
    table {
        border-collapse: collapse;
        width: 400px;
        padding: 0.35em;
        background-color: #fff;
        border: 1px solid #dee2e6;
        border-radius: 0.25em;
        max-width: 100 %;
        height: auto;
    }

    th {
        background-color: #254AA2;
        color: white;
        width: 500px;
        font-size: 1em;
        font-family: 'Constantia';
        font-weight: bold;
    }

    th, td {
        border: 1px solid black;
        padding: 10px;
        vertical-align: top;
        padding: 15px;
        text-align: left;
    }

    td {
        height: 50px;
        vertical-align: bottom;
    }

    tr:hover {
        background-color: aquamarine;
    }

</style>
			<table>
				<tr>
					<th>connecter_le</th>
					<th>login</th>
					<th>Arrivée</th>
					<th>Départ</th>
					<th>Total</th>
					<th>Deconnexion</th>
				</tr>
					
			
			<?php
				include_once('../Model/Dao_Pointage.php');
				$pointage = new Dao_Pointage();
				$pointage->setId_collaborateur($_GET['id']);

				$var = $pointage->selectPointage_user();


				foreach ($var as $key => $value) { 
			?>
					
				<tr>
					<td> 
						<?php echo $var[$key]['day'] ; ?> :
						<?php echo $var[$key]['date_add'] ; ?>
					</td>
					<td> <?php echo $var[$key]['heure_add'] ; ?></td>
					<td> <?php echo $var[$key]['heure_begin'] ; ?></td>
					<td> <?php echo $var[$key]['heure_end'] ; ?></td>
					<td><?php 
						// 9H de travail = 32400 secondes
							$nbre_heure_travail = 9;
							$pourcentage_travail =0;
						echo $var[$key]['nbre_heure'] ; ?></</td>
					<td> <?php echo $var[$key]['date_end'] ; ?></td>
				</tr>
				<!-- decoupage heure -->
				<?php
					// $nbre =  $var[$key]['nbre_heure'] ;
					// $i=0;
					// $h = 0;

					// for ($i=0; $i < $t-4; $i++)
					// { 
					// 	$h = $h.$var[$i];
					// 	echo $nbre[$i];
					// }
				?>
			<?php
				}
			?></table>
			Total :
			<?php
				$total = new Dao_Pointage(); 
				$total->setId_collaborateur($_GET['id']);
				$count = $total->countTime();
				$var = $count[0]['nbre_heure'];
				$t =strlen($var);
				// echo strlen($var);
			?>
			<!-- <br> -->
			<?php
				// echo $var;
			?>
			<!-- <br> -->
			<?php
			$i=0;
			$heure = 0;
			for ($i=0; $i < $t-4; $i++) { 
				$heure = $heure.$var[$i];
				echo $var[$i];
			}?>
			<?php
				// echo $var[($t-6)];
				// echo $var[($t-5)];
				echo "heure".$var[($t-4)].$var[($t-3)];
				echo "min";
				echo $var[($t-2)].$var[($t-1)]; 
				echo 's';

			?>
			<br>
			<?PHP

				$min = $var[$t-4].$var[$t-3];
				// echo $heure*60;
				$sec = $var[($t-2)].$var[($t-1)];
			?>
		</div>
	</div>
	<?php 
	include_once('footer.php');?> 
</body>
<script src="../bootstrap-3.3.7/js/tests/vendor/jquery.min.js"></script>
<script src="../bootstrap-3.3.7/js/transition.js"></script>
<script src="../bootstrap-3.3.7/js/dropdown.js"></script>
<script src="../bootstrap-3.3.7/js/collapse.js"></script>
<script src="../bootstrap-3.3.7/js/tooltip.js"></script>
<script src="../bootstrap-3.3.7/js/modal.js"></script>
<script src="../bootstrap-3.3.7/js/scrollspy.js"></script>
</html>