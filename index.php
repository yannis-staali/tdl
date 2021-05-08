<?php

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
            header("Location: todolist.php");
        }
    echo'<pre>';
    var_dump($result);
    echo'<pre>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>TODOLIST</h1>
    <h2>Connexion</h2>
    <form action="" method="POST">
        <label for="login">Login</label>
        <input type="text" id="login" name="login"></input>
        <label for="password">Password</label>
        <input type="text" id="password" name="password"></input>

        <input type="submit" name="submit"></input>
    </form>
</body>
</html>