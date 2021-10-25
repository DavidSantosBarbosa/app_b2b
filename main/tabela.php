<div class="row">
    <div class="col s10 m6">
        <div>
            <table id="table_id" class="display striped">
                <thead>
                    <tr>
                        <th>Column 1</th>
                        <th>Column 2</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>David</td>
                        <td>Adm</td>
                    </tr>
                    <tr>
                        <td>Janderson</td>
                        <td>Analista</td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>

</div>

<script>
    $(document).ready(function() {
        $('#table_id').DataTable({
            "language": {

                "url": "main/dataTables/traducao/traducao.json"
            },
            "pagingType": "simple_numbers",
            "lengthMenu": [5, 7, 10, 20]

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
</style>