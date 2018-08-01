<?php

    try{
        
	$con = mysqli_connect('localhost','root','','testweb2');
	if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
	}
        // Recebe os parametros
        $cpf_passageiro = $_GET['cpf_passageiro'];
        $nm_passageiro = $_GET['nm_passageiro'];
        $data_passageiro = $_GET['data_passageiro'];
        $sex_passageiro = $_GET['sex_passageiro'];

        $dataFormat = DateTime::createFromFormat('d/m/Y', $data_passageiro);
        $dataPadrao = $dataFormat->format('Y-m-d');
        
	mysqli_select_db($con,"ajax_demo");
	$sql = " INSERT INTO tb_passageiro (cpf_passageiro, nm_passageiro, data_passageiro, sex_passageiro) " . 
                " VALUES ( '" . $cpf_passageiro . "', '" . $nm_passageiro . "', '" . $dataPadrao . 
                "', '" . $sex_passageiro . "' ) ";
	$result = mysqli_query($con,$sql);
    }catch(Exception $ex) {
        echo ("Erro " + $ex);
    }
?>