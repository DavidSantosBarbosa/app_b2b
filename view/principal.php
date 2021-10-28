<script src="main/charts/charts.js"></script>
<script>
    function dash(total, prioritario, prioritario_sla) {
        document.getElementById('total').innerHTML = total;
        document.getElementById('prioritario').innerHTML = prioritario;
        document.getElementById('prioritario_sla').innerHTML = prioritario_sla;
    }
</script>

Bem Vindo <?php echo $_SESSION['nome'] ?>


<div class="row">
    <div class="col s12">
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Dia', 'Em Tratativa', 'Paralizado'],
                    ['23', 12, 4],
                    ['24', 9, 1],
                    ['25', 23, 8]
                ]);

                var options = {
                    title: 'Resumo',
                    hAxis: {
                        title: 'Dias',
                        titleTextStyle: {
                            color: '#333'
                        }
                    },
                    vAxis: {
                        minValue: 0
                    }
                };

                var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
        </script>

    </div>
</div>

<div class="row">
    <div class="col s12 m6">
        <div id="">

        </div>
    </div>
    <div class="col s12 m6">
        <div class='card-panel'>
            <table>
                <tr>
                    <th>
                        Total:
                    </th>
                    <td id='total' class=''>

                    </td>
                </tr>
                <tr>
                    <th>
                        Prioritário:
                    </th>
                    <td id='prioritario' class=''>

                    </td>
                </tr>
                <tr>
                    <th>
                        Prioritário por SLA:
                    </th>
                    <td id='prioritario_sla' class=''>

                    </td>
                </tr>
            </table>
        </div>
    </div>

</div>

<div class="row">
    <div class="col s12">
        <table id="table_id" class="display striped responsive-table">
            <thead>
                <tr>
                    <th>U</th>
                    <th>TA</th>
                    <th>BD</th>
                    <th>Cliente</th>
                    <th>Status</th>
                    <th>Técnico</th>
                    <th>Ultima Atualização</th>
                    <th>Age</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $info_total = 0;
                $info_prioridades = 0;
                $info_prioridades_sla = 0;
                foreach (get_data() as $key => $value) {

                    $prioritario = "";
                    if (prioridades($value['bd']) == "sim") {
                        $prioritario = "<span class='material-icons'>priority_high</span>";
                        $info_prioridades += 1;
                    }


                    $color = "";
                    if ($value['Faixa'] == "Acima de 5d") {
                        $color = "class='red lighten-3'";
                        $prioritario = "<span class='material-icons'>priority_high</span>";
                        $info_prioridades_sla += 1;
                    }
                    echo "<tr $color>";
                    echo "<td>$prioritario</td>";
                    echo "<td>" . (isset($value['TARaiz']) ? $value['TARaiz'] : $value['Sequencia']) . "</td>";
                    echo "<td>" . (isset($value['bd']) ? $value['bd'] : $value['TíqueteReferência']) . "</td>";
                    echo "<td>" . (strlen($value['cliente_nome']) > 40 ? substr($value['cliente_nome'], 0, 40) . "..." : $value['cliente_nome']) . (isset($value['nome_cliente']) ? "" : nome_cliente($value['Alarme'])) . "</td>";
                    echo "<td>" . (pegar_status($value["ObservaçãoHistórico"])) . "</td>";
                    echo "<td>" . (pegar_tecnico($value["ObservaçãoHistórico"])) . "</td>";
                    echo "<td></td>";
                    echo "<td>" . $value['Faixa'] . "</td>";
                    echo "<td><input data-target='modal1' class='btn orange modal-trigger' type='button' value='Interagir' onclick='priorizar(" . (isset($value['bd']) ? $value['bd'] : $value['TíqueteReferência']) . ", " . (isset($value['TARaiz']) ? $value['TARaiz'] : $value['Sequencia']) . ", \"" . $value['cliente_nome'] . "\")'></td>";
                    echo "</tr>";
                    $info_total += 1;
                }
                echo "<script>dash($info_total,$info_prioridades,$info_prioridades_sla);</script>";


                ?>


            </tbody>
        </table>
    </div>
</div>

<div id="modal1" class="modal">
    <div class="modal-content">
        <h4 id='ta'></h4>
        <form action="">
            <table>
                <tr>
                    <th>
                        BD:
                    </th>
                    <td id="">
                        <input type="text" name="bd_inp" id="bd_inp" readonly="true">
                    </td>
                </tr>
                <tr>
                    <th>
                        Cliente:
                    </th>
                    <td id="">
                        <input type="text" name="cliente" id="cliente" readonly="true">
                    </td>
                </tr>
                <tr>
                    <th>
                        Ação
                    </th>
                    <td>
                        <input class="btn orange" type="button" value="Priorizar">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Fechar</a>
    </div>
</div>


<!--div id="chart_div" style="width: 100%; height: 200px;"></div-->
<script>
    // MODAL
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems, "");
    });

    // DATA TABLES //////////////////////////////////
    $(document).ready(function() {
        $('#table_id').DataTable({
            "language": {

                "url": "main/dataTables/traducao/traducao.json"
            },
            "pagingType": "simple_numbers",
            "lengthMenu": [5, 7, 10, 20],
            "dom": '<"top"i>rt<"bottom"flp><"clear">'

        });

    });

    function priorizar(bd, ta, cliente) {
        document.getElementById('ta').innerHTML = "BD: " + bd + " / TA: " + ta;
        document.getElementById('bd_inp').value = bd;
        document.getElementById('cliente').value = cliente;

    }
</script>

<style>
    .paginate_button {
        padding: 3px;
        margin: 3px;
        color: #000;
        text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
        border: 1px solid #000;
        background-color: orange;
        font-size: 12px;
        font-weight: bold;
        text-align: center;
        cursor: pointer;
        border-radius: 5px;
        -webkit-box-shadow: none;
        box-shadow: none;
    }

    /* Hide scrollbar for Chrome, Safari and Opera */
    .example::-webkit-scrollbar {
        display: none;
    }

    /* Hide scrollbar for IE, Edge and Firefox */
    .example {
        -ms-overflow-style: none;
        /* IE and Edge */
        scrollbar-width: none;
        /* Firefox */
    }
</style>

<?php

function get_data()
{
    include "main/pdo.php";
    $cmd = $pdo->query("SELECT  * FROM  appb2b_base_eventos_b2b A LEFT JOIN appb2b_base_eventos_ta B ON A.TARaiz = B.Sequencia UNION ALL SELECT  * FROM appb2b_base_eventos_b2b A RIGHT JOIN appb2b_base_eventos_ta B ON A.TARaiz = B.Sequencia WHERE   A.TARaiz IS NULL");
    $data = $cmd->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function parse_obs($obs)
{
    $obs = explode("CFO", $obs);
    if (count($obs) > 1) {
        $obs_res = $obs[1];
    } else {
        $obs_res = "Não informado";
    }
    return $obs_res;
}

function nome_cliente($obs)
{
    $obs = explode("CLIENTE", $obs);
    if (count($obs) > 1) {
        $obs_res = substr($obs[1], 0, 15);
    } else {
        $obs_res = "";
    }
    return $obs_res;
}

function prioridades($bd)
{
    include "main/pdo.php";
    $cmd = $pdo->query("SELECT  * FROM  appb2b_prioridades WHERE bd = '$bd'");
    $data = $cmd->fetchAll(PDO::FETCH_ASSOC);
    if (count($data) > 0) {
        return "sim";
    } else {
        return "não";
    }
}

function pegar_tecnico($obs)
{
    $obs = explode("@@", $obs);
    if (count($obs) > 1) {
        $obs_res = explode("Técnico:", $obs[1]);
        $tecnico = explode("\n", $obs_res[1]);
        return $tecnico[0];
    } else {
        return "Não informado";
    }
}

function pegar_status($obs)
{
    $obs = explode("@@", $obs);
    if (count($obs) > 1) {
        $obs_res = explode("Status:", $obs[1]);
        $status = explode("\n", $obs_res[1]);
        return $status[0];
    } else {
        return "Não informado";
    }
}

function pegar_previsao($obs)
{
    $obs = explode("@@", $obs);
    if (count($obs) > 1) {
        $obs_res = explode("Previsão:", $obs[1]);
        $previsao = explode("\n", $obs_res[1]);
        return $previsao[0];
    } else {
        return "Não informado";
    }
}
?>