<?php
	session_start();
	include_once('../Model/Dao_Fonction.php');
	
	$fonction = new Dao_Fonction();
	
	$designation = $_POST['designation'];
// Prrofil
	$fonction->setDesignation($designation);

	if (  strlen($designation)!=0 )
	{
		
		$fonction->Add();
		echo 'reussi';
		
		if($_SESSION['action'] !=null)
		{
			header("location:../Vue/create_user.php");
		}
		else
		{
			header("location: ../Vue/index_fonction.php");
		}
	}
	else
	{
		if(strlen($_SESSION['fin'] )!=0)
		{
			$_SESSION = array();
			session_unset();
			session_destroy();
			header("location:../../liste_personne.php");
		}
		else
		{
			$message="Veuillez renseigner les données";
			header("location:../Vue/new_profil.php?message=".$message);
		}
		
	}


	// if ($password != $password1) {
	 	
	//  } 

?>