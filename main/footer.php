<?php
// menu lateral
?>
<div id="slide-out" class="sidenav">
    <div class='row' style="margin-top: 20px;">
        <div class='col s12'>
            <form action="func/navigate.php" method="post">
                <input type="text" name="pagina" id="pagina" value='view/importar_base_b2b' hidden>
                <input class='btn grey darken-3' name="sair" type="button" value="ADM" onclick="submit()">
            </form>
        </div>
    </div>
    <div class='row'>
        <div class='col s12'>
            <form action="func/navigate.php" method="post">
                <input type="text" name="pagina" id="pagina" value='view/principal' hidden>
                <input class='btn grey darken-3' name="sair" type="button" value="Principal" onclick="submit()">
            </form>
        </div>
    </div>
    <div class='row'>
        <div class='col s12'>
            <form action="main/session_close.php" method="post">
                <input class='btn grey darken-3' name="sair" type="button" value="Sair" onclick="submit()">
            </form>

        </div>
    </div>

</div>
<a href="#" data-target="slide-out" class="sidenav-trigger" style="top:2px; right:3px; position:fixed; "><i style="font-size: 300%;color:orange;text-shadow: 1px 1px 1px rgba(0, 0, 0, 1)" class="material-icons">menu</i></a>



</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems, "");
    });
</script>

</html>