<?php
require 'main/header.php';

session_start();

$erro = isset($_GET['erro']) ? $_GET['erro'] : null;
if ($erro == "r001") {
    echo "<script> "
        . "M.toast({html: 'Usuário e senha incorreto, ou usuario inesistente', classes: 'rounded'});"
        . " </script>";
}



include (isset($_SESSION['page']) ? $_SESSION['page'] : 'view/login').'.php';

require 'main/footer.php';

?>