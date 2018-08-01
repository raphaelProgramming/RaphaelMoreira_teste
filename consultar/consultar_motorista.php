
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
    
    function imprimirStatus($id){
        switch ($id){
            case 1:
                return "Ativo";
            break;
            case 2:
                return "Inativo";
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
    $sql = "SELECT * FROM tb_motorista";
    $result = mysqli_query($con, $sql);
    echo "<br><h3> Lista dos motoristas cadastrados </h3><hr>";
    echo "<table class='table table-bordered' >
                    <thead>    
                    <tr>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                    <th>Sexo</th>
                    <th>Status</th>
                    <th>Modelo do carro</th>
                    </tr>
                    </thead>
                    <tbody>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['cpf_motorista'] . "</td>";
        echo "<td>" . $row['nm_motorista'] . "</td>";
        echo "<td>" . imprimirData($row['data_motorista']) . "</td>";
        echo "<td>" . imprimirSexo($row['sex_motorista']) . "</td>";
        echo "<td>" . imprimirStatus($row['status_motorista']) . "</td>";
        echo "<td>" . $row['modelo_carro'] . "</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
    mysqli_close($con);
?>
