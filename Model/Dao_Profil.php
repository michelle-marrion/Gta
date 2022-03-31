 <?php

include_once('connexion_to_bd.php');
include_once('../Entity/Profil.php');

	class Dao_Profil extends Profil
	{
		public $requet ;
		public $donnees ;	

		public function selectProfil()
		{ 
			// for list profil, with choice user profil
			$connexion = new connexion_to_bd();
			$connexion->etablir_connection();

			$requet = $connexion->getConnexion()->query('SELECT * from profil');		
					
			$donnees = $requet-> fetchAll();			
			return $donnees;			
		}

		public function SelectAll()
		{
			$connexion = new connexion_to_bd();
			$connexion->etablir_connection();
			
			$requet = $connexion->getConnexion()->prepare('SELECT `id_profil`,`designation` from profil where designation =:designation');
			$requet->execute(array( 'designation' => $this->getDesignation()  )) or die(print_r($requet->errorInfo()));
			
			$donnees = $requet-> fetchAll();
			
						return $donnees;
			// $requet->closeCursor();
		}
		public function Add()
		{
			$connexion = new connexion_to_bd();
			$connexion->etablir_connection();
			// echo $this->getNom() ;
			$requet = $connexion->getConnexion()->prepare(' INSERT INTO `profil`(`designation`, `date_add`) VALUES(:designation,NOW())');
			$requet->execute(array(
				'designation'=> $this->getDesignation() ,
				// 'status' => $this->getStatus() ,
			)) or die(print_r($requet->errorInfo()));
			
			$requet->closeCursor();
		}
		 public function UpDate()
		 {
			$connexion = new connexion_to_bd();
			$connexion->etablir_connection();
			$requet = $connexion->getConnexion()->prepare('UPDATE profil set designation =:designation, date_update = NOW(),where id =:id');

			$requet->execute(array(
				'designation'=> $this->getDesignation() ,
			)) or die(print_r($requet->errorInfo()));
			// echo 'modifier';
			$requet->closeCursor();
			// $conect->execute('');
		}

		public function Delete()
		{
			$connexion = new connexion_to_bd();
			$connexion->etablir_connection();
			$requet = $connexion->getConnexion()->prepare('DELETE from profil  where id =:id');

			$requet->execute(array(
				'id' => $this->getId_profil(),
			))or die(print_r($requet->errorInfo()));
			//echo 'supprimer';
			$requet->closeCursor();
		}
		public function getRequette()
		{
			return $this->requet;
		}
		public function setRequette($requet)
		{
			 $this->requet = $requet;
		}
	}
?>