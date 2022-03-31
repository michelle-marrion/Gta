 <?php

include_once('connexion_to_bd.php');
include_once('../Entity/Personne.php');

	class Dao extends Personne
	{
		public $requet ;
		public $donnees ;	
		public function select()
		{
			$connexion = new connexion_to_bd();
			$connexion->etablir_connection();

			$requet = $connexion->getConnexion()->prepare('SELECT * from personne where id =:id');
			$requet->execute(array(
				'id' => $this->getId(),
			)) or die(print_r($connexion->errorInfo())) ;
			
			// $this->$requette = $connexion->getConnexion()->query('SELECT * from personne where nom = $_SESSION['nom'] and prenom = $_SESSION['prenom']');
			while ($donnees = $requet->fetch()) {
				$id = $donnees['id'];
				$nom = $donnees['nom'];
				$prenom = $donnees['prenom'];
				$mail = $donnees['mail'];
				$date = $donnees['date'];			
			}
			$requet->closeCursor();
		}
		public function auth()
		{
			$connexion = new connexion_to_bd();
			$connexion->etablir_connection();

			$requet = $connexion->getConnexion()->prepare('SELECT * from personne where Nom=:nom and prenom=:prenom');
			$requet->execute(array(
				'nom' => $this->getNom(),
				'prenom' =>$this->getPrenom(),
			)) or die(print_r($connexion->errorInfo())) ;		
			// echo $_SESSION['nom']=$this->getNom();
			// echo $_SESSION['prenom']=$this->getPrenom();		
			$donnees = $requet-> fetchAll();			
			return $donnees;
			//$requet->closeCursor();
		}

		public function SelectAll()
		{
			$connexion = new connexion_to_bd();
			$connexion->etablir_connection();

			$requet = $connexion->getConnexion()->query('SELECT * from personne');
			$requet->execute();	
			$donnees = $requet-> fetchAll();
			return $donnees;
			// $requet->closeCursor();
		}
		public function Add()
		{
			$connexion = new connexion_to_bd();
			$connexion->etablir_connection();
			echo $this->getNom() ;
			$requet = $connexion->getConnexion()->prepare(' INSERT INTO personne (`Nom`, `prenom`, `Tel`, `mail`, `date`) VALUES (:Nom, :prenom, :tel, :mail, NOW())');
			$requet->execute(array(
				'Nom'=> $this->getNom() ,
				'prenom' => $this->getPrenom() ,
				'tel' => $this->getTel() ,
				'mail' => $this->getMail() ,
			)) or die(print_r($requet->errorInfo()));
			
			// $conect->execute('INSERT INTO `personne` (`id`, `Nom`, `prenom`, `Tel`, `mail`, `date`) VALUES (, '$_SESSION['nom']', '$_SESSION['prenom']', '$_SESSION['tel']','$_SESSION['mail']', '$_SESSION['date']' )');
			$requet->closeCursor();
		}
		 public function UpDate()
		 {
			$connexion = new connexion_to_bd();
			$connexion->etablir_connection();
			$requet = $connexion->getConnexion()->prepare('UPDATE personne set Nom =:Nom, prenom =:prenom, Tel =:tel, mail =:mail where id =:id');

			$requet->execute(array(
				'Nom'=> $this->getNom() ,
				'prenom' => $this->getPrenom() ,
				'tel' => $this->getTel() ,
				'mail' => $this->getMail() ,
				'id'=> $this->getId(),
			)) or die(print_r($requet->errorInfo()));
			// echo 'modifier';
			$requet->closeCursor();
			// $conect->execute('');
		}

		public function Delete()
		{
			$connexion = new connexion_to_bd();
			$connexion->etablir_connection();
			$requet = $connexion->getConnexion()->prepare('DELETE FROM personne where id =:id');

			$requet->execute(array(
				'id' => $this->getId(),
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