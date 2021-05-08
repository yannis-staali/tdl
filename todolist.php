<?php
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: index.php");
   
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="style.css"/>

    <title>TODOLIST</title>
</head>
<body>
    <form action="traitement.php" method="POST">
        <button name="deconnexion" type="submit">Deconnexion</button>
    </form>
    <h1>TODOLIST</h1>

    <h3>A faire</h3>
    <div id="taches_afaire"></div>

    <h3 class='titre_done'>Taches accomplies</h3>
    <div id="taches_done"></div>

    <h3>Ajouter une tache</h3>
    <form id="form_add" action="traitement.php" method="POST">
    <label for="new_taskname">Nom de la tache : </label>
    <input id="new_taskname" name="taskname" type="text"></input>
    <input name="add_task" type="submit"></input>
    </form>

 
    <script src="script.js"></script> 
</body>
</html>


