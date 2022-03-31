 <?php

include_once('connexion_to_bd.php');
include_once('../Entity/Pointage.php');

	class Dao_Pointage extends Pointage
	{
		public $requet ;
		public $donnees ;	

		public function selectPointage_user()
		{ 
			// for list profil, with choice user profil
			$connexion = new connexion_to_bd();
			$connexion->etablir_connection();

			$requet = $connexion->getConnexion()->prepare('SELECT `id_pointage`, `id_collaborateur`,DAYNAME(`date_add`) as day ,DATE(`date_add`) as date_add, `heure_add`,`heure_begin`,`heure_end`, TIMEDIFF(`heure_end`,`heure_begin`) as nbre_heure, DATE(`date_end`) as date_end, `heure_delete` FROM `pointage` WHERE `id_collaborateur`=:id');		
			$requet->execute(array(
				'id'=> $this->getId_collaborateur() ,
			))
			or die(print_r($requet->errorInfo()));
			$donnees = $requet-> fetchAll();			
			return $donnees;			
		}
		public function countTime()
		{ 
			// for list profil, with choice user profil
			$connexion = new connexion_to_bd();
			$connexion->etablir_connection();

			$requet = $connexion->getConnexion()->prepare('SELECT sum(TIMEDIFF(`heure_end`,`heure_begin`)) as nbre_heure FROM `pointage` WHERE `id_collaborateur`=:id');		
			$requet->execute(array(
				'id'=> $this->getId_collaborateur() ,
			))
			or die(print_r($requet->errorInfo()));
			$donnees = $requet-> fetchAll();			
			return $donnees;			
		}


		// connexion
		public function Begin()
		{
			$connexion = new connexion_to_bd();
			$connexion->etablir_connection();
			// echo $this->getNom() ;
			$requet = $connexion->getConnexion()->prepare(' INSERT INTO `pointage`(`date_add`,`heure_add`,`id_collaborateur`) VALUES(CURRENT_DATE(), CURRENT_TIME(),:id)');
			$requet->execute(array(
				'id'=> $this->getId_collaborateur() ,
				// 'status' => $this->getStatus() ,
			)) or die(print_r($requet->errorInfo()));
			
			$requet->closeCursor();
		}
		// deconnexion
		public function End()
		{
			$connexion = new connexion_to_bd();
			$connexion->etablir_connection();
			// echo $this->getNom() ;
$requet = $connexion->getConnexion()->prepare(' UPDATE `pointage`SET `date_end`=CURRENT_DATE(), `heure_delete`=CURRENT_TIME() where `id_collaborateur` =:id  and `date_add`=CURRENT_DATE()');
			$requet->execute(array(
				'id'=> $this->getId_collaborateur() ,
				// 'status' => $this->getStatus() ,
			)) or die(print_r($requet->errorInfo()));
			// $requet->closeCursor();
		}
		// heure arrivée déjà insérer
		public function Verify()
		{
			$connexion = new connexion_to_bd();
			$connexion->etablir_connection();
			$requet = $connexion->getConnexion()->prepare('SELECT * from pointage where id_collaborateur =:id and date_add = CURRENT_DATE()');

			$requet->execute(
				array(
				'id'=> $this->getId_collaborateur() ,
			)) 
			or die(print_r($requet->errorInfo()));		
			$donnees = $requet->fetchAll();
			return $donnees;
			// $conect->execute('');
		}
		public function debut()
		{
			$connexion = new connexion_to_bd();
			$connexion->etablir_connection();
			echo $this->getHeure_begin();
			$requet = $connexion->getConnexion()->prepare(' UPDATE `pointage`SET `heure_begin`=:heure where `id_collaborateur` =:id and `date_add`=CURRENT_DATE()');
			$requet->execute(array(
				'heure'=> $this->getHeure_begin(),
				'id'=> $this->getId_collaborateur() ,
				// 'status' => $this->getStatus() ,
			)) or die(print_r($requet->errorInfo()));
			// $requet->closeCursor();
		}
		public function fin()
		{
			$connexion = new connexion_to_bd();
			$connexion->etablir_connection();
			echo $this->getHeure_begin();
			$requet = $connexion->getConnexion()->prepare(' UPDATE `pointage`SET `heure_end`=:heure where `id_collaborateur` =:id and `date_add` = CURRENT_DATE()');
			$requet->execute(array(
				'heure'=> $this->getHeure_end(),
				'id'=> $this->getId_collaborateur() ,
				// 'status' => $this->getStatus() ,
			)) or die(print_r($requet->errorInfo()));
			// $requet->closeCursor();
		}

		 public function UpDate()
		 {
			$connexion = new connexion_to_bd();
			$connexion->etablir_connection();
			$requet = $connexion->getConnexion()->prepare('UPDATE pointage set designation =:designation, date_update = NOW(),where id =:id');

			$requet->execute(array(
				'designation'=> $this->getDesignation() ,
			)) or die(print_r($requet->errorInfo()));
			// echo 'modifier';
			$requet->closeCursor();
			// $conect->execute('');
		}

		// public function Delete()
		// {
		// 	$connexion = new connexion_to_bd();
		// 	$connexion->etablir_connection();
		// 	$requet = $connexion->getConnexion()->prepare('DELETE from profil  where id =:id');

		// 	$requet->execute(array(
		// 		'id' => $this->getId_profil(),
		// 	))or die(print_r($requet->errorInfo()));
		// 	//echo 'supprimer';
		// 	$requet->closeCursor();
		// }
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