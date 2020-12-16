<?php
    require_once(__DIR__ . '/header.php');
    require_once('inc/functions.php');
?>

<pre>
<?php

//var_dump($_POST);
if (isset($_POST['pseudo'])) {
    echo htmlentities($_POST['pseudo']);
}

?>
</pre>

<h2>Test des formulaires</h2>
<form method="POST">
    <select name="civilite">
        <option value="Madame">Madame</option>
        <option value="Monsieur">Monsieur</option>
    </select>
    <input type="text" name="pseudo" value="<?php echo isset($_POST['pseudo']) ? htmlentities($_POST['pseudo']) : ''; ?>"/>
    <textarea name="contenu"></textarea>
    <input type="email" name="email" />
    <button type="submit">Envoyer</button> // Bouton pour envoyer le formulaire
</form>

<h2>Test des boucles</h2>
<?php
    $array = ['un', 'deux', 'trois', 'quatre'];
    while ($i++ < count($array)) {
        if (!($i % 2)) { // évite les membres impairs
            continue;
        }
        echo $array[$i]; // Affichera : deux quatre
    }
?>

<h2>Test des fonctions</h2>
<?php
    $mon_menu = array('menu1', 'menu2');
    // Exécute la fonction utilisateur
    echo '<ul>';
    affiche_menu($mon_menu);
    echo '</ul>';
?>

<h2>Tests sur les variables statiques</h2>
<ul>
    <?php
        for($i = 0; $i < 10; $i++) {
            echo '<li>Self-count vaut : ' . self_count() . '</li>';
        }
    ?>
</ul>


