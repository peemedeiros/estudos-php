<?php
    if(!isset($_SESSION))
        session_start();

    //verifica se houve um $_post
    if(isset($_POST['btn-salvar'])){
        //importa o arquivo de conexao;
        require_once('conexao.php');
        
        //chama a função que faz a conexão com o banco de dados;
        $conexao = conexaoMysql();
		
        //resgatando os dados informados pelo usuário
        $nome = $_POST['txt-nome'];
        $telefone = $_POST['txt-telefone'];
        $celular = $_POST['txt-celular'];
        $email = $_POST['txt-email'];
        $codEstado = $_POST['sltestados'];
		
        //explode() - percorre uma string de dados , localiza um caracter coringa e quebra em um array de dados cada dado separado
        $data_nascimento = explode("/", $_POST['txt-data-nascimento']);
		
        //var_dump($data_nascimento);
        $data_nascimento = $data_nascimento[2]."-".$data_nascimento[1]."-".$data_nascimento[0];
		
        $sexo = $_POST['rd-opcoes'];
        $obs = $_POST['txt-obs'];

        // verifica se o o botão esta retornando a palavra INSERIR

        if( strtoupper($_POST['btn-salvar']) == "INSERIR"){
            $sql = "
                insert into tblcontatos (nome,telefone,celular,
                email,dt_nasc,sexo,obs,codestado)
                values('".$nome."','".$telefone."','".$celular."',
                '".$email."','".$data_nascimento."','".$sexo."',
                '".$obs."', ".$codEstado.")
                ";
        } else if( strtoupper($_POST['btn-salvar']) == "EDITAR" ){
            $sql = "update tblcontatos set
                nome ='".$nome."',telefone ='".$telefone."',
                celular='".$celular."',email='".$email."',
                dt_nasc='".$data_nascimento."',sexo='".$sexo."',
                obs='".$obs."',codestado = ".$codEstado." where codigo =".$_SESSION['codigo'];
        }
        
        // echo($sql);

        //Executa um script no banco de dados (se o script der certo iremos redirecionar para a página de cadastro, se não mostrar mensagem de erro)
		
        if(mysqli_query($conexao, $sql))
            //redireciona para uma determinada página
            header('location:../formulario.php');
        else{
            echo(" Erro ao executar o script no banco");
        }
    }

?>