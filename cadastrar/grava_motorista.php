<?php

    try{
        
	$con = mysqli_connect('localhost','root','','testweb2');
	if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
	}
        // Recebe os parametros
        $cpf_motorista = $_GET['cpf_motorista'];
        $nm_motorista = $_GET['nm_motorista'];
        $data_motorista = $_GET['data_motorista'];
        $sex_motorista = $_GET['sex_motorista'];
        $status_motorista = $_GET['status_motorista'];
        $modelo_de_carro = $_GET['modelo_de_carro'];
        
        $dataFormat = DateTime::createFromFormat('d/m/Y', $data_motorista);
        $dataPadrao = $dataFormat->format('Y-m-d');
	mysqli_select_db($con,"ajax_demo");
	$sql = " INSERT INTO tb_motorista (cpf_motorista, nm_motorista, data_motorista, sex_motorista, status_motorista, modelo_carro) " . 
                " VALUES ( '" . $cpf_motorista . "', '" . $nm_motorista . "', '" . $dataPadrao . 
                "', '" . $sex_motorista . "', '" . $status_motorista . "', '" .  $modelo_de_carro . "' ) ";
	$result = mysqli_query($con,$sql);
        
    }catch(Exception $ex) {
        echo ("Erro " + $ex);
    }
?>