<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main/materialize/css/materialize.min.css">
    <script src="main/materialize/js/materialize.min.js"></script>
    <script src="main/dataTables/datatables.min.js"></script>
    <script src="main/dataTables/jQuery-3.6.0/jquery-3.6.0.min.js"></script>
    <script src="main/dataTables/DataTables-1.11.3/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="css/materialicons.css">
    


    <title>APP</title>
</head>

<body>
    <form action="main/session_close.php" method="post">
    <input name="sair" type="button" value="Sair" onclick="submit()">
    </form>

    <form action="func/navigate.php" method="post">
    <input type="text" name="pagina" id="pagina" value='view/importar_base_b2b' hidden>
    <input name="sair" type="button" value="ADM" onclick="submit()">
    </form>

</body>

</html>