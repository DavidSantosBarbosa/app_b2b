<?php
require 'main/header.php';

session_start();
$logado = isset($_SESSION['logado'])? $_SESSION['logado'] : "";
if ($logado == "sim") {

include (isset($_SESSION['page']) ? $_SESSION['page'] : 'view/login').'.php';

require 'main/footer.php';

}else{
    include 'view/login.php';
}

$erro = isset($_GET['erro']) ? $_GET['erro'] : null;
if ($erro == "r001") {
    echo "<script> "
        . "M.toast({html: 'Usuário e senha incorreto, ou usuario inesistente', classes: 'rounded'});"
        . " </script>";
}



?>