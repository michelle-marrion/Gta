<?php
     $connexion = new PDO('mysql:host=localhost;dbname=gta', 'root', '');
     if ($connexion !=null) {
        echo 'connecter';
     }
     // Récupère la recherche
    //  $recherche = isset($_POST['recherche']) ? $_POST['recherche'] : '';
    $recherche = $_POST['recherche'];
    echo 'hey';
    if (strlen($recherche)!=0) {
        $q = $connexion->prepare(
     "SELECT `id`, `Nom`, `prenom`, `Tel`, `mail`, `date` FROM `personne`
      WHERE `Nom` LIKE '%$recherche%'
      OR `prenom` LIKE '%$recherche%'
      LIMIT 10");
      $q->execute();
    //   /$sr = $q->fecthAll();
      if($q!= null)
      {
          echo 'hello';
      }
      else
      {
          echo 'non';
      }
     $r = $q->fetchAll();
     if ($r!= null) {
       echo 'la requette retourne';
     }
  foreach ($r as $key => $value) 
  {
    echo 'Résultat de la recherche: '.$r[$key]['Nom'].', '.$r[$key]['prenom'].' <br />';
  }
}
?>