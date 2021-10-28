<?php

require "pdo.php";

// Autenticar usuário

$validar = $pdo->prepare("SELECT * FROM appb2b_usuarios WHERE id = :id AND senha = :senha");
$validar->bindValue(":id", $_POST['user']);
$validar->bindValue(":senha", $_POST['pass']);
$validar->execute();
$resultado = $validar->fetch();

if($validar->rowCount() > 0) {
    session_start();
    $_SESSION['id'] = $_POST['id'];
    $_SESSION['nome'] = $resultado['nome'];
    $_SESSION['page'] = "view/principal";
    header("Location: ../app.php");
} else {
    header("Location: ../app.php?erro=r001");
}


?>