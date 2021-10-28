<?php

require '../main/pdo.php';

// data hora atual sao paulo
//date_default_timezone_set('America/Sao_Paulo');




$arquivo = $_FILES['file']['tmp_name'];
$nome = $_FILES['file']['name'];

$verificar_extencao = explode('.', $nome);

$limpar_tabela = $pdo->query("TRUNCATE TABLE appb2b_base_eventos_ta");
$limpar_tabela->execute();

if (strtolower(end($verificar_extencao)) == 'csv') {
    $dados = fopen($arquivo, 'r');
    
    while($linhas = fgetcsv($dados, 1000, ';')){
        echo $linhas[0]."<br>";
        echo $linhas[1]."<br>";
        echo $linhas[2]."<br>";
        echo $linhas[3]."<br>";
        echo $linhas[4]."<br>";
        echo $linhas[5]."<br>";
        echo $linhas[6]."<br>";
        echo $linhas[7]."<br>";
        echo "******************<br>";
        //$cmd = $pdo->prepare("insert into appb2b_base_eventos_b2b values(:bd,:GestorResponsávelBD,:TMRMinutos,:TempoFormatado,:Faixa,:cliente_nome,:bd_raiz,:TARaiz,:ultima_atualização)");
        $cmd = $pdo->query("insert into appb2b_base_eventos_ta values('$linhas[0]','$linhas[1]','$linhas[2]','$linhas[3]','$linhas[4]','$linhas[5]','$linhas[6]','$linhas[6]',now())");
        /* $cmd->execute(array(
            ':bd' => $linhas[0],
            ':GestorResponsávelBD' => $linhas[1],
            ':TMRMinutos' => $linhas[2],
            ':TempoFormatado' => $linhas[3],
            ':Faixa' => $linhas[4],
            ':cliente_nome' => $linhas[5],
            ':bd_raiz' => $linhas[6],
            ':TARaiz' => $linhas[7],
            ':ultima_atualização' => date('Y-m-d H:i:s')
        )); */
        
    }
}

echo '<br><br>';

echo var_dump($dados);




?>