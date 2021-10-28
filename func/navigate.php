<?php

session_start();

$pagina = $_POST['pagina'];

$_SESSION['page'] = $pagina;

header("Location: ../app.php");





?>