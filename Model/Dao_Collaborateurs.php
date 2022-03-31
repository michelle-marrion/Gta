 <?php
	include_once('../Entity/Collaborateur.php');

	include_once('connexion_to_bd.php');

	class Dao_C extends Collaborateur
	{
		public $requet ;
		public $donnees ;	
		public function selectId()
		{
			$connexion = new connexion_to_bd();
			$connexion->etablir_connection();

			$requet = $connexion->getConnexion()->prepare('SELECT `id_collaborateur`from collaborateurs where nom =:nom');
			$requet->execute(array(
				'nom' => $this->getNom(),
			)) or die(print_r($requet->errorInfo())) ;
			
			// $this->$requette = $connexion->getConnexion()->query('SELECT * from personne where nom = $_SESSION['nom'] and prenom = $_SESSION['prenom']');
			$donnees = $requet->fetchAll();
			return $donnees;
			$requet->closeCursor();
		}
		public function auth()
		{
			$connexion = new connexion_to_bd();
			$connexion->etablir_connection();

			$requet = $connexion->getConnexion()->prepare('SELECT * from collaborateurs where mail=:mail and status = 1 and password=:password');
			$requet->execute(array(
				'mail' => $this->getMail(),
				'password' =>$this->getPassword(),
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

			$requet = $connexion->getConnexion()->prepare('SELECT `id_collaborateur`, `nom`, `prenom`, `mail`, `password`, `tel`, `collaborateurs`.`date_add`, `collaborateurs`.`date_update`, `collaborateurs`.`date_delete`, `collaborateurs`.`status`, `profil`.`designation` as `profil`, `fonction`.`designation` as `fonction` FROM `collaborateurs` INNER JOIN `fonction` on `fonction`.`id_fonction`=`collaborateurs`.`id_fonction` INNER JOIN `profil` on `collaborateurs`.`id_profil`=`profil`.`id_profil` where `collaborateurs`.`status` = 1' );
			$requet->execute();	
			$donnees = $requet-> fetchAll();
			return $donnees;
			// $requet->closeCursor();
		}
		public function Poubelle()
		{
			$connexion = new connexion_to_bd();
			$connexion->etablir_connection();

			$requet = $connexion->getConnexion()->prepare('SELECT `id_collaborateur`, `nom`, `prenom`, `mail`, `password`, `tel`, `collaborateurs`.`date_add`, `collaborateurs`.`date_update`, `collaborateurs`.`date_delete`, `collaborateurs`.`status`, `profil`.`designation` as `profil`, `fonction`.`designation` as `fonction` FROM `collaborateurs` INNER JOIN `fonction` on `fonction`.`id_fonction`=`collaborateurs`.`id_fonction` INNER JOIN `profil` on `collaborateurs`.`id_profil`=`profil`.`id_profil` where `collaborateurs`.`status` = 0' );
			$requet->execute();	
			$donnees = $requet-> fetchAll();
			return $donnees;
			// $requet->closeCursor();
		}
		public function Add()
		{
			$connexion = new connexion_to_bd();
			$connexion->etablir_connection();
			// echo $this->getNom() ;
			// echo $this->getPrenom() ;
			// echo $this->getId_profil() ;
			// echo $this->getId_fonction();
			$requet = $connexion->getConnexion()->prepare('INSERT INTO `collaborateurs`(`nom`, `prenom`, `mail`, `password`, `tel`, `date_add`, `status`, `id_profil`, `id_fonction`) VALUES (:nom,:prenom,:mail,:password,:tel,now(),:state,:id_profil,:id_fonction)');
			$requet->execute(array(
				'nom'=> $this->getNom() ,
				'prenom' => $this->getPrenom() ,
				'mail' => $this->getMail() ,
				'password' => $this->getPassword(),
				'tel' => $this->getTel() ,
				'state' => 1,
				'id_profil' => $this->getId_profil(),
				'id_fonction' => $this->getId_fonction(),
			)) or die(print_r($requet->errorInfo()));
			// if ($requet !=null) {
			// 	echo 'AAAA';
			// }
			// $conect->execute('INSERT INTO `personne` (`id`, `Nom`, `prenom`, `Tel`, `mail`, `date`) VALUES (, '$_SESSION['nom']', '$_SESSION['prenom']', '$_SESSION['tel']','$_SESSION['mail']', '$_SESSION['date']' )');
			$requet->closeCursor();
		}
		 public function UpDate()
		 {
			$connexion = new connexion_to_bd();
			$connexion->etablir_connection();
			$requet = $connexion->getConnexion()->prepare('UPDATE collaborateurs set nom =:nom, prenom =:prenom, mail =:mail, password =:password, tel =:tel,date_update = now(), id_profil =:id_profil, id_fonction =:id_fonction where id_collaborateur =:id');

			$requet->execute(array(
				'nom'=> $this->getNom() ,
				'prenom' => $this->getPrenom() ,
				'mail' => $this->getMail() ,
				'password' => $this->getPassword(),
				'tel' => $this->getTel() ,
				'id_profil' => $this->getId_profil(),
				'id_fonction' => $this->getId_fonction(),
				'id'=> $this->getId_collaborateur(),
			)) or die(print_r($requet->errorInfo()));
			if ($requet != null) {
				echo 'yes';
			}
			// $requet->closeCursor();
			// $conect->execute('');
		}

		public function Delete()
		{
			$connexion = new connexion_to_bd();
			$connexion->etablir_connection();
			$requet = $connexion->getConnexion()->prepare('UPDATE collaborateurs set nom =:nom, prenom =:prenom, mail =:mail, password =:password, tel =:tel,date_delete = now(),status =0, id_profil =:id_profil, id_fonction =:id_fonction where id_collaborateur =:id');

			$requet->execute(array(
				'nom'=> $this->getNom() ,
				'prenom' => $this->getPrenom() ,
				'mail' => $this->getMail() ,
				'password' => $this->getPassword(),
				'tel' => $this->getTel() ,
				'id_profil' => $this->getId_profil(),
				'id_fonction' => $this->getId_fonction(),
				'id' => $this->getId_collaborateur(),
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