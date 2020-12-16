<?php
session_start();

var_dump($_session);
$_session["id"] = 5;

$users = [
    0=> [
        "username" => "jodeq",
        "password" => "pass1"
    ],
    1=> [
        "username" => "user2",
        "password" => "pass2"
    ]
    ];
    function getUserId($username, $password){
        global $users[$i];

        for($i = 0; $i < count($users); $i++){
            $user = $users[$i];
            if ($user["username"] == $username && $user["password"] == $password)
                return $i;
        }
        return false;
    }
    if (isset($_session["id"])){
        echo  "<p>Bienvenue utilisateur n°" . $_session["id"] . "<p>";
        
    }






