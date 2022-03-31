<?php
	session_start();
	include_once('../Model/Dao_Pointage.php');
	
	$pointage = new Dao_Pointage();
	
	echo $_SESSION['id_collaborateur'];
	// echo $_POST['begin'];
	// 
	// 
	$action = $_SESSION['action']; 

	if ($action == 'debut') 
	{
		echo $begin = $_POST['begin'];
		if (  strlen($begin)!=0)
		{
			$pointage->setId_collaborateur($_SESSION['id_collaborateur']);
			$pointage->setHeure_begin($begin);
			$pointage->debut();
			// echo 'reussi';		
			header("location:../Vue/main.php");
		}
		else
		{
				$message="Veuillez renseigner les données";
				header("location:../Vue/new_pointage.php?message=".$message);
			}	
		}
	else
	{
		if ($action == 'fin') 
		{
			// echo $_POST['end'];
			$end = $_POST['end'];
			if (  strlen($end)!=0)
			{
				$pointage->setId_collaborateur($_SESSION['id_collaborateur']);
				$pointage->setHeure_end($end);
				$pointage->fin();
				 echo 'reussi';		
				header("location:../Vue/main.php");
			}
			else
			{
					$message="Veuillez renseigner les données";
					header("location:../Vue/new_pointage.php?message=".$message);
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
		// $end = $_POST['end'];
		}
		// $end = $_POST['end'];
	}
	


	// if ($password != $password1) {
	 	
	//  } 

?>