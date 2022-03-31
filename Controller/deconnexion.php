<?php
  session_start();

  include_once('../Model/Dao_Collaborateurs.php');
  include_once('../Model/Dao_Pointage.php');
  //collaborateurs
  $requette = new Dao_C();
  $requette->setNom($_SESSION['nom']);
  $id = $requette->selectId();

  //Pointage
  $pointage = new Dao_Pointage();
  $pointage->setId_collaborateur($id[0]['id_collaborateur']);
  $pointage->End();
  // echo $id[0]['id_collaborateur'];

  $_SESSION = array(); //Ecraser tableau de session
			session_unset();// Detruit toute les Variables de la session en cours
			session_destroy();// Destruit la session en cours
			header("location:../index.php"); // rediriger l'utilisateur
		
?>