<?php

echo "Exercices sur les tableaux PHP";


$mon_tableau = array(1, 2, 3, 4, 5, 6);
$autre_tableau = ["a" => 7, 1 => 8, "c" => 9];

echo "<pre>";
var_dump($mon_tableau);
var_dump($autre_tableau);
echo "</pre>";

echo "ma troisème valeur est " . $mon_tableau[2] . "<br>";
echo "mon indice 3 contient la valeur " . $mon_tableau[3] . "<br>";
echo "mon indice 'a' contient la valeur " . $autre_tableau["a"] . "<br>";

$mon_tableau[] = 7;
$autre_tableau[] = 10;
echo "<pre>";
var_dump($mon_tableau);
var_dump($autre_tableau);
echo "</pre>";

foreach($autre_tableau as $indice => $valeur)
  echo "pour l'indice $indice la valeur est $valeur <br>";



/* isset() */
if (!isset($a)) {
  $a = 42; // Si la variable $a n'existe pas déjà, on la défini avec comme valeur 42.
}

/* empty() */
if (!empty($a)) {
  echo $a . "<br>"; // Si la variable $a n'est pas vide, on affiche sa valeur.
}

/* unset() */
unset($a); // Maintenant qu'on a défini puis utilisé la variable $a, on la détruit.

echo "<br>";

/* time(); */
$t = time(); // affecte à $t le nombre de secondes écoulées depuis le 01/01/1970 à l'instant ou l'instruction est exécutée.

/* date() */
echo date('d / m / Y H:i:s', $t) ."<br>"; // Affichera la date au format JJ / MM / AAAA, par exemple 21 / 10 / 2015.

/* count() */
$b = array('pomme', 'poire', 'abricot');
echo count($b)."<br>"; // Affichera 3, car $b contient 3 valeurs.

/* strlen() */
$c = 'Hello World !';
echo strlen($c)."<br>"; // Affichera 13, car $c contient 13 caractères (cela inclut les espaces)


echo date('c', strtotime('+6 months')) ."<br>";





$personnes = array(
  '0' => array(
      'nom' => 'Dupont',
      'prenom' => 'Pierre',
      'email' => 'pierre.d@gmail.com',
      'telephones' => array(
          'fixe' => '03 00 00 00 00',
          'portable' => '06 00 00 00 00'
      )
  ),
  '1' => array(
      'nom' => 'Dupont',
      'prenom' => 'Jean',
      'email' => 'jean.d@gmail.com',
      'telephones' => array(
          'fixe' => '03 00 00 00 00',
          'portable' => '06 00 00 00 00'
      )
  ),
  '2' => array(
      'nom' => 'Dupont',
      'prenom' => 'Marie',
      'email' => 'marie.d@gmail.com',
  ),
);



foreach($personnes as $personne) {
  echo 'Nom : '.$personne['nom'].'<br/>';
  echo 'Prénom : '.$personne['prenom'].'<br/>';
  echo 'Email : '.$personne['email'].'<br/>';

  // On vérifie l'existence de la cellule des téléphones
  //if (isset($personne['telephones'])) {
      foreach($personne['telephones'] as $telephone) {
          echo 'Téléphone : '.$telephone.'<br/>';
      }
  //}
}


?>