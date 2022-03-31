                               
<?php
/*---------------------------------------------------------------*/
/*
    Titre : Moteur de recherche basique - MySQLi                                                                          
                                                                                                                          
    URL   : https://phpsources.net/code_s.php?id=98
    Auteur           : Jerome                                                                                             
    Date édition     : 20 Nov 2004                                                                                        
    Date mise à jour : 18 Sept 2019                                                                                      
    Rapport de la maj:                                                                                                    
    - refactoring du code en PHP 7                                                                                        
    - fonctionnement du code vérifié                                                                                    
*/
/*---------------------------------------------------------------*/
?>
     <html>
          <form method="POST" action="traitement.php"> 
          Rechercher un mot : <input type="text" name="recherche">
          <input type="submit" value="Search!"> 
          </form>
     </html>

     <?php

//     $db_server = 'localhost'; // Adresse du serveur MySQL
//     $db_name = 'php';            // Nom de la base de données
//     $db_user_login = 'root';  // Nom de l'utilisateur
//     $db_user_pass = '';       // Mot de passe de l'utilisateur

    // Ouvre une connexion au serveur MySQL
//     $conn = mysqli_connect($db_server,$db_user_login, $db_user_pass, $db_name);
//     $connexion = new PDO('mysql:host=localhost;dbname=gta', 'root', '');
//      // Récupère la recherche
//      $recherche = isset($_POST['recherche']) ? $_POST['recherche'] : '';

//      // la requete mysql
//      $q = $connexion->query(
//      "SELECT `id`, `Nom`, `prenom`, `Tel`, `mail`, `date` FROM `personne`
//       WHERE `Nom` LIKE '%$recherche%'
//       OR `prenom` LIKE '%$recherche%'
//       LIMIT 10");
//       $sr = $q->fecthAll();

     // affichage du résultat
//      while( ){
//      echo 'Résultat de la recherche: '.$r['Nom'].', '.$r['prenom'].' <br />'
// ;
//      }
?>

