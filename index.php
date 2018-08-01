<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
        <title> Teste Web: conexão com banco de dados com AJAX + PHP </title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
        
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js'></script>
        <script src="script/funcoes.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col col-lg-2"></div>
                <div class="col-md-8 col-md-auto">
                <br>
                <ul class="nav nav-pills nav-justified" role="tablist">
                    <li class="nav-item active"><a class="nav-link" data-toggle="tab" href="#form_motorista" role="tab"><i class="fa fa-user-plus"></i> Cadastrar Motorista</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#form_passageiro" role="tab"><i class="fa fa-user-plus"></i> Cadastrar Passageiro</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#form_corrida" role="tab"><i class="fa fa-user-plus"></i> Cadastrar Corridas</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#consultar_motorista" onclick="exibir_Cadastros(1);"role="tab"><i class="fa fa-address-card"></i> Consultar Motoristas</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#consultar_passageiro" onclick="exibir_Cadastros(2);" role="tab"><i class="fa fa-user"></i> Consultar Passageiro</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#consultar_corrida" onclick="exibir_Cadastros(3);" role="tab"><i class="fa fa-automobile"></i> Consultar Corridas</a></li>
                </ul>
                </div>
                <div class="col col-lg-2"></div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col col-lg-2"></div>
                <div class="col-md-8 col-md-auto">
                    <br>
                    <div class="tab-content">
                        <div id="form_motorista" class="tab-pane fade in active">
                            <h4>Cadastre Motoristas:</h4>
                            <hr>
                            <form id="form_moto" name="form_moto" onsubmit="return validateForm(1)" method="post">
                                <div class="form-group">
                                    <label for="cpf_motorista">CPF:</label>
                                    <input type="text" class="form-control" name="cpf_motorista">
                                </div>
                                <div class="form-group">
                                    <label for="nm_motorista">Nome:</label>
                                    <input type="text" class="form-control" name="nm_motorista">
                                </div>
                                <div class="form-group">
                                    <label for="data_motorista">Data de Nascimento</label>
                                    <!-- Datepicker as text field -->         
                                    <div class="input-group date" data-date-format="DD/MM/AAAA">
                                        <input  type="text" name="data_motorista" class="form-control" placeholder="DD/MM/AAAA">
                                        <div class="input-group-addon" >
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sex_motorista">Sexo:</label>
                                    <select class="form-control" name="sex_motorista">
                                        <option value="0">Selecione</option>
                                        <option value="1">Masculino</option>
                                        <option value="2">Feminino</option>
                                        <option value="3">Outro</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status_motorista">Você está de férias?</label>
                                    <select class="form-control" name="status_motorista">
                                        <option value="0">Selecione</option>
                                        <option value="1">Sim</option>
                                        <option value="2">Não</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="modelo_carro">Modelo de Carro:</label>
                                    <input type="text" class="form-control" name="modelo_carro">
                                </div>
                                <div class="submitgravar">
                                    <button class="btn btn-success" type="submit">Gravar</button>
                                </div>
                            </form>
                        </div>
                        <div id="form_passageiro" class="tab-pane fade">
                            <h4>Cadastre Passageiro:</h4>
                            <hr>
                            <form name="form_pass" onsubmit="return validateForm(2)" method="post">
                                <div class="form-group">
                                    <label for="cpf_passageiro">CPF:</label>
                                    <input type="text" class="form-control" name="cpf_passageiro">
                                </div>
                                <div class="form-group">
                                    <label for="nm_passageiro">Nome:</label>
                                    <input type="text" class="form-control" name="nm_passageiro">
                                </div>
                                <div class="form-group">
                                    <label for="data_passageiro">Data de Nascimento</label>
                                    <!-- Datepicker as text field -->         
                                    <div class="input-group date" data-date-format="DD/MM/AAAA">
                                        <input  type="text" name="data_passageiro" class="form-control" placeholder="DD/MM/AAAA">
                                        <div class="input-group-addon" >
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sex_passageiro">Sexo:</label>
                                    <select class="form-control" name="sex_passageiro">
                                        <option value="0">Selecione</option>
                                        <option value="1">Masculino</option>
                                        <option value="2">Feminino</option>
                                        <option value="3">Outro</option>
                                    </select>
                                </div>
                                <div class="submitgravar">
                                    <button class="btn btn-success" type="submit">Gravar</button>
                                </div>
                            </form>
                        </div>
                        <div id="form_corrida" class="tab-pane fade">
                            <h4>Cadastre Corridas:</h4>
                            <hr>
                            <form name="form_corr" onsubmit="return validateForm(3)" method="post">
                                <div class="form-group">
                                    <label for="valor_corrida">Valor da Corrida:</label>
                                    <input type="text" class="form-control" name="valor_corrida">
                                </div>
                                <div class="form-group">
                                    <label for="tb_id_passageiro">Nome do Passageiro:</label>
                                    <select class="form-control" name="tb_id_passageiro">
                                        <option value="0">Selecione</option>
                                        <?php
                                        try{

                                            $con = mysqli_connect('localhost', 'root', '', 'testweb2');
                                            if (!$con) {
                                                die('Could not connect: ' . mysqli_error($con));
                                            }
                                            $sql = "SELECT * FROM tb_passageiro";
                                            $results = mysqli_query($con, $sql);
                                            foreach ($results as $row) {
                                                echo '<option value="' . $row['id_passageiro'] . '" >' . $row['nm_passageiro'] . '</option>';
                                            }
                                        } catch (Exception $ex){
                                            echo ("Erro " + $ex);
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tb_id_motorista">Nome do Motorista:</label>
                                    <select class="form-control" name="tb_id_motorista">
                                        <option value="0">Selecione</option>
                                        <?php
                                        try{

                                            $con = mysqli_connect('localhost', 'root', '', 'testweb2');
                                            if (!$con) {
                                                die('Could not connect: ' . mysqli_error($con));
                                            }
                                            $sql = "SELECT * FROM tb_motorista WHERE status_motorista = 1";
                                            $results = mysqli_query($con, $sql);
                                            foreach ($results as $row) {
                                                echo '<option value="' . $row['id_motorista'] . '" >' . $row['nm_motorista'] . '</option>';
                                            }
                                        } catch (Exception $ex){
                                            echo ("Erro " + $ex);
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="submitgravar">
                                    <button class="btn btn-success" type="submit">Gravar</button>
                                </div>
                            </form>
                        </div>
                        <div id="consultar_motorista" class="tab-pane fade">
                            <div id="dados-motorista"></div>
                        </div>    
                        <div id="consultar_passageiro" class="tab-pane fade">
                            <div id="dados-passageiro"></div>
                        </div>    
                        <div id="consultar_corrida" class="tab-pane fade">
                            <div id="dados-corrida"></div>
                        </div>    
                    </div>
                </div>
                <div class="col col-lg-2"></div>
            </div>
        </div>
    </body>
    <script>
        $('.input-group.date').datepicker({
           format: "dd/mm/yyyy",
        });
    </script>
</html>
