<?php

    try{
        
	$con = mysqli_connect('localhost','root','','testweb2');
	if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
	}
        // Recebe os parametros
        $valor_corrida = $_GET['valor_corrida'];
        $tb_id_passageiro = $_GET['tb_id_passageiro'];
        $tb_id_motorista = $_GET['tb_id_motorista'];
        
	mysqli_select_db($con,"ajax_demo");
	$sql = " INSERT INTO tb_corrida (valor_corrida, tb_id_passageiro, tb_id_motorista) " . 
                " VALUES ( '" . $valor_corrida . "', '" . $tb_id_passageiro . "', '" . $tb_id_motorista . "' ) ";
	$result = mysqli_query($con,$sql);
    }catch(Exception $ex) {
        echo ("Erro " + $ex);
    }
?>