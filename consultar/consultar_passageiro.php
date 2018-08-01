
<?php
    function imprimirSexo($id){
        switch ($id){
            case 1:
                return "Masculino";
            break;
            case 2:
                return "Feminino";
            break;
            case 3:
                return "Outro";
            break;
            default:
                return "undefined";
        }
    }
        
    function imprimirData($date){
        $dataFormat = DateTime::createFromFormat('Y-m-d', $date);
        $dataPadrao = $dataFormat->format('d/m/Y');
        return $dataPadrao;
    }
    
    $con = mysqli_connect('localhost', 'root', '', 'testweb2');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }

    mysqli_select_db($con, "ajax_demo");
    $sql = "SELECT * FROM tb_passageiro";
    $result = mysqli_query($con, $sql);
    echo "<br><h3> Lista dos passageiros cadastrados </h3><hr>";
    echo "<table class='table table-bordered' >
                    <thead>    
                    <tr>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                    <th>Sexo</th>
                    </tr>
                    </thead>
                    <tbody>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['cpf_passageiro'] . "</td>";
        echo "<td>" . $row['nm_passageiro'] . "</td>";
        echo "<td>" . imprimirData($row['data_passageiro']) . "</td>";
        echo "<td>" . imprimirSexo($row['sex_passageiro']) . "</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
    mysqli_close($con);
?>
