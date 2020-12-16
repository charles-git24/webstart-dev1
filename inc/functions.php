<?php

/*
* Nom de la fonction : affiche_menu
* Arguments : $menus (tableaux de menus)
* Ne retourne aucune valeur
*/
function affiche_menu($menus)
{
    foreach($menus as $key => $value) {
        echo '<li>'.$value.'</li>';
    }
}

/*
 * Pour conserver une valeur locale 
 * au sein d'une fonction on peut
 * utiliser une variable "static"
 * 
 */
function self_count() 
{
    static $a = 0; // $a est initialisé à 0 lors du premier appel de la fonction mais n'est plus réinitialiser lors des autres appels.
    $a++;

    return $a;
}

function post(string $index)
{
    if (isset($_POST[$index]))
        return $_POST[$index];
    return false;
}
