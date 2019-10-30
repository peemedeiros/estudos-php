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

        if( $_FILES['fleFoto']['size'] > 0 && $_FILES['fleFoto']['type'] != "" ){
            //guarda o tamanho do arquivo a ser upado pelo servidor.
            $arquivo_size = $_FILES['fleFoto']['size'];

            //converte o tamanho do arquivo para KB e pega somente a parte inteira da conversão (com o metodo ROUND)
            $tamanho_arquivo = round($arquivo_size / 1024);

            $arquivos_permitidos = array("image/jpeg", "image/jpg", "image/png");

            //Guarda o tipo de extenção do arquivo a ser upado para o servidor
            $ext_arquivo = $_FILES['fleFoto']['type'];

            //valida o tipo de arquivo a ser upado para o servidor
            if(in_array($ext_arquivo, $arquivos_permitidos)){

                //valida o tamanho máximo de arquivo a ser upado para o servidor
                if($tamanho_arquivo < 1024){

                    //Permite retornar apenas o nome do arquivo 'pathinfo(var, PATHINFO_FILENAME)'
                    $nome_arquivo = pathinfo($_FILES['fleFoto']['name'], PATHINFO_FILENAME);
                    
                    //Permite retornar apenas a extensão do arquivo 'pathinfo(var, PATHINFO_EXTENSION)' 
                    $ext = pathinfo($_FILES['fleFoto']['name'], PATHINFO_EXTENSION);
                    
                    //No PHP podemos usar dois algoritmos de criptografia (MD5, SHA1)

                    //Ex: rash(tipo, 'texto');

                    //Estamos gerando uma chave com o nome do arquivo + uniqid(time()) que é um numero aleatório com base em uma hh:mm:ss
                    $nome_arquivo_cripty = md5(uniqid(time()).$nome_arquivo);
                    
                    $foto = $nome_arquivo_cripty.".".$ext;

                    $arquivo_temp = $_FILES['fleFoto']['tmp_name'];

                    $diretorio = "aquivos/";

                    if(move_uploaded_file($arquivo_temp, $diretorio.$foto)){
                        //verifica se o o botão esta retornando a palavra INSERIR
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
                        //Executa um script no banco de dados (se o script der certo iremos redirecionar para a página de cadastro, se não mostrar mensagem de erro)
                        if(mysqli_query($conexao, $sql))
                            //redireciona para uma determinada página
                            //header('location:../formulario.php');
                            echo('');
                        else{
                            echo(" Erro ao executar o script no banco");
                        }
                    }else{
                        echo("<script> alert('Nao foi possivel enviar o arquivo para o servidor') </script>");
                    }
            
                }else{
                    echo("<script> alert('tamanho de arquivo não suportado, o limite máximo é de 2MB') </script>");
                }

            }else{
                echo("<script> alert('TIPO de arquivo não suportado') </script>");
            }//guarda o tamanho do arquivo a ser upado pelo servidor.
            $arquivo_size = $_FILES['fleFoto']['size'];

            //converte o tamanho do arquivo para KB e pega somente a parte inteira da conversão (com o metodo ROUND)
            $tamanho_arquivo = round($arquivo_size / 1024);

            $arquivos_permitidos = array("image/jpeg", "image/jpg", "image/png");

            //Guarda o tipo de extenção do arquivo a ser upado para o servidor
            $ext_arquivo = $_FILES['fleFoto']['type'];

            //valida o tipo de arquivo a ser upado para o servidor
            if(in_array($ext_arquivo, $arquivos_permitidos)){

                //valida o tamanho máximo de arquivo a ser upado para o servidor
                if($tamanho_arquivo < 1024){

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
                        //header('location:../formulario.php');
                        echo('It is works!');
                    else{
                        echo(" Erro ao executar o script no banco");
                    }

                }else{
                    echo("<script> alert('tamanho de arquivo não suportado, o limite máximo é de 2MB') </script>");
                }

            }else{
                echo("<script> alert('TIPO de arquivo não suportado') </script>");
            }
        }else{
            echo("<script> alert('Aquivo selecionado não é compativel com os requisitos') </script>");
        }

    }
?>