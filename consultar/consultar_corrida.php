
<?php

    $con = mysqli_connect('localhost', 'root', '', 'testweb2');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }

    mysqli_select_db($con, "ajax_demo");
    $sql = "SELECT valor_corrida, nm_motorista, nm_passageiro FROM tb_corrida, tb_motorista, tb_passageiro WHERE tb_id_passageiro = id_passageiro AND tb_id_motorista = id_motorista";
    $result = mysqli_query($con, $sql);
    echo "<br><h3> Lista das Corridas Cadastradas </h3><hr>";
    echo "<table class='table table-bordered' >
                    <thead>    
                    <tr>
                    <th>Valor da Corrida</th>
                    <th>Nome do Passageiro</th>
                    <th>Nome do Motorista</th>
                    </tr>
                    </thead>
                    <tbody>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['valor_corrida'] . "</td>";
        echo "<td>" . $row['nm_motorista'] . "</td>";
        echo "<td>" . $row['nm_passageiro'] . "</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
    mysqli_close($con);
?>
