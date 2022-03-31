<?php
// session_start();
	// if (!isset($_SESSION['nom'])) {
	// 	header('location:3tiers/Vue/auth.php');
	// }
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Enregistrer</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7/dist/css/bootstrap.min.css">
	<script rel="stylesheet" type="text/css" href="../bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
</head>
<!-- <style>
	table
	{
		border-collapse: collapse;
		margin-top: 10px;
	}
	th, td
	{
		border: 1px solid black;
		padding-right:5px;
		padding-bottom:5px;
		padding-top:5px;
		padding-left:5px;
	}
	
	th
	{
		background-color:red;
	}
	button a
	{
		text-decoration: none;
		color:white;
	}
	button
	{

		margin: auto;
			margin-left: 0px;
			border:none;
			height: 50px;
			width: 150px; 
			border-radius: 5px ;
			font-size: 1.0em;
		background-color: #1b6ec2;
		
	}
	button: hover
	{
		background-color:red;
	}
</style>
 --><style>
   
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
<body >
	<!-- <div>
		<h1>Bienvenue <?php 
		// echo $_SESSION['nom']?></h1>
	</div> -->
	 <?php
		 include_once('entete.php');
	?> 
<div class="container-fluid" style="margin-top:100px; height: 500px ;overflow: auto;">
	

	<!-- <div  style="padding-top: 150px;">
		<button>	<a ><span class="glyphicon glyphicon-plus"></span>Ajouter</a></button>
		<button>	<a href="../Controller/deconnexion.php"><span class="glyphicon glyphicon-log-out"></span>Deconnexion</a> </button>
		 <a href="../index.php"> Deconnexion</a> -->
	<!-- </div> --> 
	<!-- <div style="padding:30px;"></div> -->

<div class="d-flex p-2 mb-4 " style="padding: 40px; background-color: white; border:1px solid white; ">
        <a class="btn btn-sm btn-primary col-md-2 ml-3" href="create_user.php?action=ajouter"><span class="glyphicon glyphicon-plus"></span> Nouveau  Utilisateur</a>
        <a class="col-lg-6"></a>
        <a class="btn btn-sm btn-primary col-md-2 ml-3" ><span class="glyphicon glyphicon-plus"></span> Nouvelle  Fonction</a>
</div>

<h1>Liste des Utilisateurs</h1>
<hr />
	
<div class="search-container" style="padding-left: 915px;">
    <form action="">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit" class="btn-info" style="border: none;" ><i class="glyphicon glyphicon-search"></i></button>
    </form>
  </div>
	<div>
		<table class="table table-hover table-bordered table-striped ">
			<thead class="thead-dark">
			<tr>
				<th></th>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Téléphone</th>
				<th> Mail</th>
				<th> Mot de Passe</th>
				<th> Fonction</th>
				<th> Profil</th>
				<th>Date</th>
				<th colspan='2'> Operation </th>
			</tr>
		</thead>
			
				<?php
				include_once('../Model/Dao_Collaborateurs.php');
				$requette = new Dao_C();
				$var = $requette->SelectAll();	
 				foreach ($var as $key => $vars)		
				{?><tr>
				
					<td> <?php ECHO $var[$key]['id_collaborateur'] ;?></td>
					<td> <?php echo $var[$key]['nom'] ;?></td>
					<td> <?php echo $var[$key]['prenom'] ;?></td>
					<td><?php echo $var[$key]['tel'] ;?></td>
					<td> <?php ECHO $var[$key]['mail'] ?></td>
					<td> <?php ECHO $var[$key]['password'] ?></td>
					<td> <?php ECHO $var[$key]['fonction'] ?></td>
					<td> <?php ECHO $var[$key]['profil'] ?></td>
					<td> <?php  echo $var[$key]['date_add']?></td>
					<td> 
						<a style='background-color: yellow,' href='edit_user.php?action=modifier&id= <?php echo $var[$key]['id_collaborateur'];?>&nom=<?php echo $var[$key]['nom'];?>&prenom=<?php echo $var[$key]['prenom'];?>&tel=<?php echo $var[$key]['tel'];?>&mail=<?php echo $var[$key]['mail'];?>'>
							<span class="glyphicon glyphicon-edit"></span>
						</a> 
					| 
						<a style='background-color: yellow,' href='detail_user.php?action=detail&id= <?php echo $var[$key]['id_collaborateur'];?>&nom=<?php echo $var[$key]['nom'];?>&prenom=<?php echo $var[$key]['prenom'];?>&tel=<?php echo $var[$key]['tel'];?>&mail=<?php echo $var[$key]['mail'];?>&password=<?php echo $var[$key]['password'];?>&fonction=<?php echo $var[$key]['fonction'];?>&profil=<?php echo $var[$key]['profil'];?>'>
							<span class="glyphicon glyphicon-eye-open"></span> 
						</a> 
					| 
						<a style=' background-color: red,' href='delete_user.php?action=supprimer&id=<?php echo $var[$key]['id_collaborateur'] ?>&nom=<?php echo $var[$key]['nom'];?>&prenom=<?php echo $var[$key]['prenom'];?>&tel=<?php echo $var[$key]['tel'];?>&mail=<?php echo $var[$key]['mail'];?>&password=<?php echo $var[$key]['password'];?>&fonction=<?php echo $var[$key]['fonction'];?>&profil=<?php echo $var[$key]['profil'];?>'>
							<span class="glyphicon glyphicon-remove"></span> 
						</a>
					
					</tr>
					<?php }?>
			
		</table>
		
	<div class="panel-group d-flex p-2 mb-4" id="accordion"style="padding:50px; background-color:white; border:1px solid white;">
    <div class="">
    	<!-- panel panel-default -->
      <div class="">
      	<!-- panel-heading -->
        <h4 class="">  
        	<!-- panel-title -->
          <a class="btn btn-sm btn-danger col-md-2 ml-3"role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
            <span class="glyphicon glyphicon-trash">Corbeille</span>
          </a>
        </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse">
        <div class="panel-body">
          <table class="table table-hover table-bordered table-striped ">
			<tr>
				<th></th>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Téléphone</th>
				<th> Mail</th>
				<th> Mot de Passe</th>
				<th> Fonction</th>
				<th> Profil</th>
				<th>Date</th>
				<th colspan='2'> </th>
			</tr>
			
				<?php
				include_once('../Model/Dao_Collaborateurs.php');
				$requette = new Dao_C();
				$var = $requette->Poubelle();	
 				foreach ($var as $key => $vars)		
				{?><tr>
				
					<td> <?php ECHO $var[$key]['id_collaborateur'] ;?></td>
					<td> <?php echo $var[$key]['nom'] ;?></td>
					<td> <?php echo $var[$key]['prenom'] ;?></td>
					<td><?php echo $var[$key]['tel'] ;?></td>
					<td> <?php ECHO $var[$key]['mail'] ?></td>
					<td> <?php ECHO $var[$key]['password'] ?></td>
					<td> <?php ECHO $var[$key]['fonction'] ?></td>
					<td> <?php ECHO $var[$key]['profil'] ?></td>
					<td> <?php  echo $var[$key]['date_add']?></td>
					</tr>
					<?php }?>
			
		</table>
        </div>
      </div>
    </div>
    
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