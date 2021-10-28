<?php

include '../main/pdo.php';

$bd = $_POST['bd'];
$status = $_POST['status'];

$verication = $pdo->query("SELECT * FROM  status WHERE bd = '$bd'");
$verication->execute();
$verication_result = $verication->fetch();

if (count($verification_result) > 0) {
    $cmd = $pdo->prepare("UPDATE status SET status = '$status' WHERE bd = '$bd'");
    $cmd->bindValue(':status', $status);
    $cmd->execute();
    echo "Status alterado com sucesso";
}else {
        $cmd = $pdo->prepare("INSERT INTO status (bd, status) VALUES ('$bd', '$status')");
        $cmd->bindValue(':bd', $bd);
        $cmd->bindValue(':status', $status);
        $cmd->execute();
        echo "Status alterado com sucesso";
}



?>