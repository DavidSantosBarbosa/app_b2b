<script src="main/charts/charts.js"></script>

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
    <div class="col s12">
    <table id="table_id" class="display striped">
                <thead>
                    <tr>
                        <th>TA</th>
                        <th>BD</th>
                        <th>Tier</th>
                        <th>Status</th>
                        <th>Técnico</th>
                        <th>Prev. Prox. Atualização</th>
                        <th>Data/Hora Abertura</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="yellow">123456<span class="material-icons red-text">priority_high</span></td>
                        <td>4040400</td>
                        <td>0</td>
                        <td>Recuperação</td>
                        <td>Wilson</td>
                        <td>25/10/21 19:00</td>
                        <td>25/10/21 10:00</td>
                        <td><input data-target="modal1" class="btn orange modal-trigger" type="button" value="Interagir"></td>
                    </tr>
                    <tr>
                        <td>654321</td>
                        <td>4012345</td>
                        <td>1</td>
                        <td>Deslocamento</td>
                        <td>Nilton</td>
                        <td>25/10/21 19:30</td>
                        <td>25/10/21 11:00</td>
                        <td><input data-target="modal1" class="btn orange modal-trigger" type="button" value="Interagir"></td>
                    </tr>
                    <tr>
                        <td>999999</td>
                        <td>4040777</td>
                        <td>1</td>
                        <td>Deslocamento</td>
                        <td>Nilton 2</td>
                        <td>25/10/21 21:00</td>
                        <td>25/10/21 07:00</td>
                        <td><input data-target="modal1" class="btn orange modal-trigger" type="button" value="Interagir"></td>
                    </tr>
                    <tr>
                        <td class="purple">888888</td>
                        <td>40488888</td>
                        <td>1</td>
                        <td>Pendente Disponibilidade técnica</td>
                        <td> -- </td>
                        <td>25/10/21 23:00</td>
                        <td>25/10/21 14:00</td>
                        <td><input data-target="modal1" class="btn orange modal-trigger" type="button" value="Interagir"></td>
                    </tr>

                </tbody>
            </table>
    </div>
</div>

<div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Modal</h4>
      <table>
          <tr>
              <th>
                  TA
              </th>
              <td>
                  123456
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
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
} 
</style>