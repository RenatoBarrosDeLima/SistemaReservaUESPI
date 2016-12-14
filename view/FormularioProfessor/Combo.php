<?php include 'conn.php'; ?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Combos Dependentes</title>
        <script src="jquery-2.1.1.min.js" type="text/javascript"></script>
    </head>
    <body>
        <select id="CbCidade"> 
            <option value="">Selecione a Cidade</option>
            <?php
            foreach ($pdo->query('SELECT codCity, nome FROM CIDADE order by nome') as $row) {
                echo '<option value="' . $row['codCity'] . '">' . $row['nome'] . '</option>';
            }
            ?>
        </select>


        <select id="CbCampus"> 
        </select>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#CbCidade').change(function (e) {
                    $('#CbCampus').empty();
                    var id = $(this).val();
                    $.post('call_cidades.php', {codCity: id}, function (data) {
                        var cmb = '<option value="">Selecione o Campus</option>';
                        $.each(data, function (index, value) {
                            cmb = cmb + '<option value="' + value.codCampus + '">' + value.nome + '</option>';
                            ;
                        });
                        $('#CbCampus').html(cmb);
                    }, 'json');
                });
            });
        </script>

        <select id="CbCentro"> 
        </select>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#CbCampus').change(function (e) {
                    $('#CbCentro').empty();
                    var id = $(this).val();
                    $.post('call_centro.php', {codCentro: id}, function (data) {
                        var cmb = '<option value="">Selecione o Centro</option>';
                        $.each(data, function (index, value) {
                            cmb = cmb + '<option value="' + value.codCentro + '">' + value.nome + '</option>';
                            ;
                        });
                        $('#CbCentro').html(cmb);
                    }, 'json');
                });
            });
        </script>
        
         <select id="CbCoordenacao"> 
        </select>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#CbCentro').change(function (e) {
                    $('#CbCoordenacao').empty();
                    var id = $(this).val();
                    $.post('call_coordenacao.php', {codCoord: id}, function (data) {
                        var cmb = '<option value="">Selecione a Coordenacao</option>';
                        $.each(data, function (index, value) {
                            cmb = cmb + '<option value="' + value.codCoord + '">' + value.nome + '</option>';
                            ;
                        });
                        $('#CbCoordenacao').html(cmb);
                    }, 'json');
                });
            });
        </script>



    </body>
</html>