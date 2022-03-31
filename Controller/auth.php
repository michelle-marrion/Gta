<?php
include_once('../Model/Dao_Collaborateurs.php');
include_once('../Model/Dao_Pointage.php');
 session_start();
	 $requette = new Dao_C();
	 $pointage = new Dao_Pointage();
 	$mail=$_POST['mail'];
	$password=$_POST['password'];	

	$requette->setMail($mail);
	$requette->setPassword($password);
	
if (  strlen($mail)!=0 && strlen($password)!=0)
	{
		
		$variable = $requette->auth();

		if ($variable != null) {
			
			$pointage->setId_collaborateur($variable[0]['id_collaborateur']);
			$pointage->Begin();
			$_SESSION['nom']= $variable[0]['nom'];
			$nameUser = $_SESSION['nom'];
			// echo $nameUser;
			 header("location:../Vue/main.php");
		}
		else
		{
			$message = "Vous n'etes pas en Bd";
			header("location:../index.php?message=".$message);
		}
			 // header("location:../Vue/nom.php?nom=".$nom."&prenom=".$prenom."&tel=".$tel); 
	}
	else
	{
		if(strlen($_SESSION['fin'] )!=0)
		{
			$_SESSION = array();
			session_unset();
			session_destroy();
			header("location:../index.php");
		}
		else
		{
			$message="Veuillez renseigner les données";
			header("location:../../Vue/index.php?message=".$message);
		}	
	}
?>
