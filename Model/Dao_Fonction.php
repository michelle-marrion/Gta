 <?php

include_once('connexion_to_bd.php');
include_once('../Entity/Fonction.php');

	class Dao_Fonction extends Fonction
	{
		public $requet ;
		public $donnees ;	

		public function selectFonction()
		{
			$connexion = new connexion_to_bd();
			$connexion->etablir_connection();

			$requet = $connexion->getConnexion()->query('SELECT * from fonction ORDER BY `designation`');						
			$donnees = $requet-> fetchAll();			
			return $donnees;
		}

		public function SelectAll()
		{
			$connexion = new connexion_to_bd();
			$connexion->etablir_connection();
			$requet = $connexion->getConnexion()->prepare('SELECT * from fonction where designation=:designation ');
			$requet->execute(array('designation' => $this->getDesignation()  ) )or die(print_r($requet->errorInfo()));
			$donnees = $requet-> fetchAll();
			
			return $donnees;
			// $requet->closeCursor();
		}
		public function Add()
		{
			$connexion = new connexion_to_bd();
			$connexion->etablir_connection();
			
			$requet = $connexion->getConnexion()->prepare(' INSERT INTO `fonction`(`designation`, `date_add`,`status`) VALUES(:designation,NOW(),1)');
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
			$requet = $connexion->getConnexion()->prepare('UPDATE fonction set designation =:designation, date_update = NOW(),where id =:id');

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
			$requet = $connexion->getConnexion()->prepare('UPDATE fonction set date_delete = NOW(), status = 0 where id =:id');

			$requet->execute(array(
				'id' => $this->getId_fonction(),
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