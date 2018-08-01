function exibir_Cadastros(view) {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (view == 1) {
                document.getElementById("dados-motorista").innerHTML = this.responseText;
            } else if (view == 2) {
                document.getElementById("dados-passageiro").innerHTML = this.responseText;
            } else if (view == 3){
                document.getElementById("dados-corrida").innerHTML = this.responseText;
            }
        }
    }
    if (view == 1) {
        xmlhttp.open("GET", "consultar/consultar_motorista.php", true);
    } else if (view == 2) {
        xmlhttp.open("GET", "consultar/consultar_passageiro.php", true);
    } else if (view == 3) {
        xmlhttp.open("GET", "consultar/consultar_corrida.php", true);
    } else {
        return;
    }
    xmlhttp.send();
}

function inserir_motorista(cpf_motorista, nm_motorista, data_motorista, sex_motorista, status_motorista, modelo_de_carro) {
    try {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("dados-motorista").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("post", "cadastrar/grava_motorista.php?cpf_motorista=" + cpf_motorista + "&nm_motorista=" + nm_motorista +
                "&data_motorista=" + data_motorista + "&sex_motorista=" + sex_motorista + "&status_motorista=" + status_motorista + "&modelo_de_carro=" + modelo_de_carro, true);
        xmlhttp.send();
    } catch (ex) {
        alert(ex);
    }
}

function inserir_passageiro(cpf_passageiro, nm_passageiro, data_passageiro, sex_passageiro) {

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("dados-passageiro").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("post", "cadastrar/grava_passageiro.php?cpf_passageiro=" + cpf_passageiro + "&nm_passageiro=" + nm_passageiro +
            "&data_passageiro=" + data_passageiro + "&sex_passageiro=" + sex_passageiro, true);
    xmlhttp.send();
}

function inserir_corrida(valor_corrida, tb_id_passageiro, tb_id_motorista) {

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("post", "cadastrar/grava_corrida.php?valor_corrida=" + valor_corrida + "&tb_id_passageiro=" + tb_id_passageiro +
            "&tb_id_motorista=" + tb_id_motorista, true);
    xmlhttp.send();
}

function validateForm(numero_form) {
    
    try {
        if (numero_form == 1) {
            var cpf_motorista = document.forms["form_moto"]["cpf_motorista"].value;
            var nm_motorista = document.forms["form_moto"]["nm_motorista"].value;
            var data_motorista = document.forms["form_moto"]["data_motorista"].value;
            var sex_motorista = document.forms["form_moto"]["sex_motorista"].value;
            var status_motorista = document.forms["form_moto"]["status_motorista"].value;
            var modelo_de_carro = document.forms["form_moto"]["modelo_carro"].value;
            
            if (cpf_motorista == "") {
                alert("O Campo CPF está vazio");
                return;
            }
            if (nm_motorista == "") {
                alert("O Campo NOME está vazio");
                return;
            }
            if (data_motorista == "") {
                alert("O Campo DATA está vazio");
                return;
            }
            if (sex_motorista == "" || sex_motorista == 0) {
                alert("O Campo SEXO está vazio");
                return;
            }
            if (status_motorista == "" || status_motorista == 0) {
                alert("O Campo STATUS DE FÉRIAS está vazio");
                return;
            }
            if (modelo_de_carro == "") {
                alert("O Campo MODELO DE CARRO está vazio");
                return;
            }
            inserir_motorista(cpf_motorista, nm_motorista, data_motorista, sex_motorista, status_motorista, modelo_de_carro);

        } else if (numero_form == 2) {
            var cpf_passageiro = document.forms["form_pass"]["cpf_passageiro"].value;
            var nm_passageiro = document.forms["form_pass"]["nm_passageiro"].value;
            var data_passageiro = document.forms["form_pass"]["data_passageiro"].value;
            var sex_passageiro = document.forms["form_pass"]["sex_passageiro"].value;

            if (cpf_passageiro == "") {
                alert("O Campo CPF está vazio");
                return;
            }
            if (nm_passageiro == "") {
                alert("O Campo NOME está vazio");
                return;
            }
            if (data_passageiro == "") {
                alert("O Campo DATA está vazio");
                return;
            }
            if (sex_passageiro == "" || sex_passageiro == 0) {
                alert("O Campo SEXO está vazio");
                return;
            }
            inserir_passageiro(cpf_passageiro, nm_passageiro, data_passageiro, sex_passageiro);

        } else if (numero_form == 3){
            var valor_corrida = document.forms["form_corr"]["valor_corrida"].value;
            var tb_id_passageiro = document.forms["form_corr"]["tb_id_passageiro"].value;
            var tb_id_motorista = document.forms["form_corr"]["tb_id_motorista"].value;
            
            if (valor_corrida == "") {
                alert("O Campo VALOR DE CORRIDA está vazio");
                return;
            }
            if (tb_id_passageiro == "" || tb_id_passageiro == 0) {
                alert("O Campo NOME DO PASSAGEIRO está vazio");
                return;
            }
            if (tb_id_motorista == "" || tb_id_motorista == 0) {
                alert("O Campo NOME DO MOTORISTA está vazio");
                return;
            }
            alert("323242424");
            inserir_corrida(valor_corrida, tb_id_passageiro, tb_id_motorista);
        } else{
            return false;
        }
    } catch (ex) {
        alert(ex.name + ': ' + ex.message);

    }

}


