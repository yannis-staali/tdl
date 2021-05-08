<?php
session_start();
if(isset($_POST['new_task']))
{
    $nom = $_POST['new_task'];
    // $nom = 'test';
    $date = date("Y-m-d");
    
    $connexion = new PDO('mysql:host=localhost;dbname=tdl;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $query = $connexion->prepare("INSERT INTO task (nom, date_ajout, status) VALUES (?, ?, ?)");
    $query->execute(array($nom, $date, 1));

    echo 'salut';

}

if(isset($_POST['done']))
{
    $id = $_POST['done'];
    $date = date("Y-m-d");

    $connexion = new PDO('mysql:host=localhost;dbname=tdl;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $query = $connexion->prepare("UPDATE task SET status = 0, date_fini = now() WHERE id = {$id}");
    $query->execute();

    echo 'yo';

}

if(isset($_POST['annuler']))
{
    $id = $_POST['annuler'];
    
    $connexion = new PDO('mysql:host=localhost;dbname=tdl;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $query = $connexion->prepare("DELETE FROM task WHERE id = {$id}");
    $query->execute();

    echo 'salut';

}

if(isset($_POST['task_encours']))
{
    // echo 'magic magic';

    $connexion = new PDO('mysql:host=localhost;dbname=tdl;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    $query = $connexion->prepare("SELECT id, nom, DATE_FORMAT(date_ajout, '%d/%m/%Y') AS date_ajout FROM task WHERE status = 1");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_OBJ);
    
    $json_response = json_encode($result);

    echo  $json_response ;
}

if(isset($_POST['task_done']))
{
    $connexion = new PDO('mysql:host=localhost;dbname=tdl;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    $query = $connexion->prepare("SELECT nom, date_ajout, DATE_FORMAT(date_fini, '%d/%m/%Y') AS date_fini, DATE_FORMAT(date_ajout, '%d/%m/%Y') AS date_ajout FROM task WHERE status = 0");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_OBJ);
    
    $json_response2 = json_encode($result);

    echo  $json_response2 ;
}

if(isset($_POST['deconnexion']))
{
   unset($_SESSION['user']);
   header("Location: index.php");
}
?>