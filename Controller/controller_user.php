<?php



	session_start();
	include_once('../Model/Dao_Collaborateurs.php');
	include_once('../Model/Dao_Fonction.php');
	include_once('../Model/Dao_Profil.php');

	$users = new Dao_C();
	$profils = new Dao_Profil();
	$fonctions = new Dao_Fonction();


	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$mail = $_POST['mail'];
	$tel = $_POST['tel'];
	$profil = $_POST['profil'];
	$fonction = $_POST['fonction'];
	$password = $_POST['password'];

	
// recuperation de l'action à éffectuer: ajouter, modifier, supprimer
	$action = $_POST['submit'];
		if ($action ==  'Créer') {
			$password1 = $_POST['password1'];
		}
		
// Collaborateurs
	$users->setNom($nom);
	$users->setPrenom($prenom);
	$users->setMail($mail);
	$users->setTel($tel);
	$users->setPassword($password);
	

// Prrofil
	// $requette2->setDesignation($profil);
	// $requette3->setDesignation($fonction);
	if (  strlen($nom)!=0 && strlen($prenom)!=0 && strlen($tel)!=0 && strlen($mail) && strlen($password)!=0)
	{
		
		//verifie si le profil existe
		// $profile = $requette2->SelectAll();
		// $function = $requette3->SelectAll();

		// if (count($profile)!=0 && count($function)!=0) {
		// 	foreach ($profile as $key => $value) {
		// 		$requette1->getId_profil($profile[$key]['id_profil']);
		// 	}
		// 	foreach ($function as $key => $value) {
		// 		$requette1->getId_fonction($function[$key]['id_fonction']);
		// 	}
			
		// 	$requette1->Add();
		// }
		// else
		// {
		// 	$requette2->Add();
		// 	$requette3->Add();
		// 	$p = $requette2->SelectAll();
		// 	$f = $requette3->SelectAll();
		// 	$requette1->getId_Profil($profile['id_profil']);
		// 	$requette1->getId_Fonction($function['id_']);
		// 	$requette1->Add();


		// }
		if ($action == 'Créer') 
		{
			$users->setId_fonction($fonction);
			$users->setId_profil($profil);
			$users->Add();
			header('location:../Vue/index_user.php');
		}
		if ($action == 'Modifier')
		{
			echo $_SESSION['id_collaborateur'];
			echo $fonction;
			echo $profil;
			$users->setId_fonction($fonction);
			$users->setId_profil($profil);
			$users->setId_collaborateur($_SESSION['id_collaborateur']);
			$users->UpDate();
			// $requette1->
			header('location: ../Vue/index_user.php');
		}
		if ($action == 'Ok') 
		{
			$profils->setDesignation($profil);
			$profile = $profils->SelectAll();
			$fonctions->setDesignation($fonction);
			$poste = $fonctions->SelectAll();
			echo $fonction;
			echo $profile[0]['id_profil'] ;
			$users->setId_profil($profile[0]['id_profil']);
			// foreach ($poste as $key => $value) {
			// 	echo $poste[$key]['id_fonction'];
			// }
			//  echo $poste[0]['id_fonction'];
			$users->setId_fonction($poste[0]['id_fonction']);

			$users->setId_collaborateur($_SESSION['id_collaborateur']);
			$users->Delete();
			header('location: ../Vue/index_user.php');
		}
			
		
		// echo 'reussi';

// Supprimer

		// if ($action == 'Envoyer') 
		// {

			
		// }
		// else
		// {
		// 	$id =$_POST['id'];
		// 	$requette->setId($id);
		// 	if ($action == 'Supprimer') {
				
		// 		$requette->Delete();
		// 	}
		// 	else
		// 	{
		// 		$requette->UpDate();
		// 	}
		// }
			 // header("location:../Vue/nom.php?nom=".$nom."&prenom=".$prenom."&tel=".$tel); 
		// header("location:../Vue/main.php");
	}
	else
	{
		// if(strlen($_SESSION['fin'] )!=0)
		// {
		// 	$_SESSION = array();
		// 	session_unset();
		// 	session_destroy();
		// 	header("location:../../liste_personne.php");
		// }
		// else
		// {
			$message="Veuillez renseigner les données";
			header("location:../Vue/create_user.php?message=".$message);
		// }
		
	}


	// if ($password != $password1) {
	 	
	//  } 

?>