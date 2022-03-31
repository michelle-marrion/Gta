<?php
	@session_start();
?>

	 <style type="text/css">

            body {
                background-color: #f4f6f7;
            }

            nav {
                font-family: 'Goudy Old Style';
                font-weight: bold;
            }

            ul li {
                font-size: 1.5em;
            }
            html {
  position: relative;
  min-height: 100%;
}
        </style>	
	<div class="container-fluid" style="">
		<nav class="navbar  navbar-expand-sm navbar-toggleable-sm   border-bottom box-shadow mb-3 navbar-default navbar-static navbar-fixed-top" id="navbar-example" role="navigation" style="background:#CBD2EC;border-bottom: 1px solid #e5e5e5;">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle"data-toggle="collapse" data-target="#monMenu" ><span class="icon-bar"></span>
					<span class="icon-bar"></span>
				<span class="icon-bar"></span></button>
					<a class="navbar-brand"href="#" style="color:#FFF; font-family:'doctor punk';font-size:1.5em;color:#254AA2;">GTA</a>
				</div>
				
				<div class="collapse navbar-collapse bs-example-js-navbar-collapse" id="monMenu">
					<ul class="nav navbar-nav nav-pills">
						<li >
							<a href="main.php">Accueil</a>
					   </li>
						<li class="dropdown">
							<a id=" drop1" role="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"aria-expanded="false"href="#qui" style="color:#254AA2;">Gestion des Paiements</a> 
							<ul class="dropdown-menu" aria-labelledby="drop1">
							 	<li><a href="#"><!-- Etat Cours --></a></li>
							 	
							 	<li><a href="#"><!-- Liste des Paiements en Cours --></a></li>

							 </ul>
						</li>
						<li class="dropdown"style="color:wheat;">
							<a id=" drop2" role="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"aria-expanded="false" href="#projet" style="color:#254AA2;">Gestion des présences</a>
							<ul class="dropdown-menu" aria-labelledby="drop2" >
								<li><a href="new_pointage.php">Emarger</a></li>
							 	<li><a href="#">Etats des Présences</a></li>
						<!-- 	 	<li role="separator" class="divider"></li>
							 	<li><a href="#">Nouvelle Matière</a></li>
							 	<li><a href="#">Nouveau Enseignant</a></li>
							 	<li role="separator" class="divider"></li>
							 	<li><a href="#">Suivi des Cours</a></li> -->

							</ul>
							 </li>
						<li class="dropdown">
							<a id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown"aria-haspopup="true"aria-expanded="false"href="#contact" style="color:#254AA2;">Gestions des Utilisateurs</a>
							<ul class="dropdown-menu" aria-labelledby="drop3">
								<li><a href="create_user.php">Ajouter un Utilisateur</a></li>
								<!-- <li><a href="#"></a></li> -->
								<li><a href="index_user.php">Listes des Utilisateurs</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="new_fonction.php">Ajouter une fonction</a></li>
								<li><a href="index_fonction.php">Listes des fonctions</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="new_profil.php">Ajouter un Profil</a></li>
								<li><a href="index_profil.php">Listes des Profils</a></li>
							</ul>
						</li>												
					</ul>
					<ul  class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a id="drop4" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"aria-expanded="false" href="#" style="color:#254AA2;"><span class="glyphicon glyphicon-log-in"></span> <?php echo @$_SESSION['nom'];?></a>
							<ul class="dropdown-menu" aria-labelledby="drop4">
								<li><a href="../Controller/deconnexion.php">Deconnexion</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		</div>