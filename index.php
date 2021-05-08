<?php
session_start();
//CONEXION BDD
$connexion = new PDO('mysql:host=localhost;dbname=tdl;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

if(isset($_POST['submit']) && isset($_POST['login']) && isset($_POST['password']) && !empty($_POST['login']) && !empty($_POST['password']))
{
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);

    $query = $connexion->prepare("SELECT*FROM user WHERE login = ? AND password = ? ");
    $query->execute(array($login, $password));
    $result = $query->fetch(PDO::FETCH_ASSOC);


        if($result["login"] == $login && $result["password"] == $password)
        {
            $_SESSION['user'] = $result["login"];

            header("Location: todolist.php");
          
        }
        else echo 'mauvais mot de passe / login';

        // echo'<pre>';
        // var_dump($_SESSION['user']);
        // echo'<pre>';
        // die();
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
    <h1>TODOLIST</h1>
    <h2 class="title_index">Connexion</h2>
    <form class="form_index" action="index.php" method="POST">
        <label for="login">Login</label>
        <input type="text" id="login" name="login"></input>
        <label for="password">Password</label>
        <input type="text" id="password" name="password"></input>

        <input type="submit" name="submit"></input>
    </form>
</body>
</html>