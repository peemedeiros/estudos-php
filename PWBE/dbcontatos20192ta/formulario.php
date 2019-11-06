<?php

// Ativa o recurso de variaveis de sessão no servidor;
if(!isset($_SESSION))
    session_start();


    // $_SESSION['NOME'] => para criar uma variavel de sessão;

    // unset($_SESSION['NOME']) => para apagar uma variavel de sessão do servidor
    // o unset pode ser usado quando o usuario faz o log out, por exemplo;

    // session_destroy() => para eliminar todas as variaveis de sessão do sistema automaticamente;

$chkFeminino = (String) "";
$chkMasculino = (String) "";
$botao = (String) "inserir";
$codEstado = (int) 0;
$siglaEstado = (String) "";
$nomeFoto = (String) "";

//importa o arquivo de conexão
require_once('bd/conexao.php');

//chamada para a function de conexão com o Mysql
$conexao = conexaoMysql();
/*valida se existe a variavel modo*/
if(isset($_GET['modo'])){
    /*valida se modo é editar*/
    if($_GET['modo']=='editar'){

        $codigo = $_GET['codigo'];

    // criamos uma variavel de sessão para enviar o código do registro para outra página 
        $_SESSION['codigo'] = $codigo;

        $selecionar = "select tblcontatos.*, tblestado.sigla 
        from tblcontatos inner join tblestado on tblestado.codigo = tblcontatos.codestado where tblcontatos.codigo = ".$codigo;
        
        $select = mysqli_query($conexao, $selecionar);
        
        if($rsConsulta = mysqli_fetch_array($select)){
            
            $nome = $rsConsulta['nome'];
            $telefone = $rsConsulta['telefone'];
            $celular = $rsConsulta['celular'];
            $email = $rsConsulta['email'];

            $codEstado = $rsConsulta['codestado'];
            $siglaEstado = $rsConsulta['sigla'];

            $data_nascimento = explode("-",$rsConsulta['dt_nasc']);
            $data_nascimento = $data_nascimento[2]."/".$data_nascimento[1]."/".$data_nascimento[0];
            $sexo = $rsConsulta['sexo'];
            if($sexo == "F"){
                $chkFeminino = "checked";
            }else if($sexo == "M"){
                $chkMasculino = "checked";
            }
            $obs = $rsConsulta['obs'];
            $nomeFoto = $rsConsulta['foto'];
            $_SESSION['nomeFoto'] = $nomeFoto;
            $botao = "editar";

        }
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Formulario
        </title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="js/jquery.js"></script>
        <script src="js/modulo.js"></script>

        <script>
            $(document).ready(function(){
                //function para abrir a modal
                $('.visualizar').click(function(){
                    $('#container').fadeIn(1000);
                });

                $('#fechar').click(function(){
                    $('#container').fadeOut(1000);
                });
            });
            //função para carregar os dados na modal
            function visualizarDados(idItem){
                $.ajax({
                    type: "POST",
                    url: "modalContatos.php",
                    data: {
                        modo:'visualizar',
                        codigo: idItem
                    },
                    success: function(dados){
                        $('#modalDados').html(dados);
                    }
                });
            }
        </script>
    </head>
    <body>

    <!-- Construir a modal que irá receber os dados de outro arquivo,
    através do JavaScript -->
    <div id="container">
        <div id="modal">
            <div id="fechar">Fechar</div>
            <div id="modalDados"></div>
        </div>  
    </div>

        <div class="caixa-principal">
            <div class="conteudo center">
                <div class="formulario center">
                    <h1 class="center">
                        CADASTRO DE CONTATOS
                    </h1>
                    <!--

                    HTML 5
                        
                        required - faz com que a caixa seja obrigatória na digitação

                        type="text"
                        type="email"
                        type="tel"
                        type="number"
                        type="range"
                        type="date"
                        type="month"
                        type="week"
                        type="url"
                        type="password"
                        type="color"

                    pattern - permite criar uma mascara para a entrada de dados no formulario

                    exemplo de expressão regular
                    
                    [[a-z\s]+$]
                    -->


                    <!--
                        Para o upload de arquivo funcionar, devemos utilizar as seguintes opções:
                        method = "POST"
                        enctype = "multipart/form-data"

                        ENCTYPE serve para informar o 'form' de que agora ele receberá não só dados em escritas, mas ojetos, arquivos, etc.
                    -->
                    <form name="frm-contatos" method="post" action="bd/salvar.php" enctype="multipart/form-data">
                        <div class="itens_formulario">
                            <div class="titulo-item-formulario">
                                NOME:
                            </div>
                            <div class="campo-formulario">
								
                                <input type="text" value="<?=@$nome?>" name="txt-nome" placeholder="Digite seu nome" onkeypress="return validarEntrada(event,'numeric');" required >
								
                            </div>
                        </div>
                        <div class="itens_formulario">
                            <div class="titulo-item-formulario">
                                TELEFONE:
                            </div>
                            <div class="campo-formulario">
								
                                <input id="telefone" type="text" value="<?=@$telefone?>" name="txt-telefone" placeholder="0xx 4002-8922" onkeypress="return mascaraFone(this,event);" required>
								
                            </div>

                        </div>
                        <div class="itens_formulario">
                            <div class="titulo-item-formulario">
                                CELULAR:
                            </div>
                            <div class="campo-formulario">
                                <input type="text" value="<?=@$celular?>" name="txt-celular" required>
                            </div>
                        </div>
                        <div class="itens_formulario">
                            <div class="titulo-item-formulario">
                                EMAIL:
                            </div>
                            <div class="campo-formulario">
                                <input type="email" value="<?=@$email?>" name="txt-email" required>
                            </div>
                        </div>
                        <div class="itens_formulario">
                            <div class="titulo-item-formulario">
                                FOTO
                            </div>
                            <div class="campo-formulario">
                                <input type="file" value="" name="fleFoto" accept="image/jpg, image/png">
                            </div>
                        </div>
                        <div class="itens_formulario">
                            <div class="titulo-item-formulario">
                                ESTADO:
                            </div>
                            <div class="campo-formulario">
                                <select name="sltestados">
                                <!-- adicionando a tabela de estados para preencher as <options> do <select> com os registros do campo -->

                                    <?php
                                        if($_GET['modo'] == 'editar'){
                                    ?>

                                    <option value="<?=$codEstado?>"> <?=$siglaEstado?> </option>

                                    <?php
                                        }else{
                                    ?>

                                    <option value="">selecione um estado</option>

                                    <?php
                                    }
                                        $sql = "select * from tblestado where codigo <>".$codEstado;
                                        $select = mysqli_query($conexao, $sql);

                                        while($rsEstados = mysqli_fetch_array($select)){
                                        ?>
                                            <option value="<?=$rsEstados['codigo']?>">
                                                <?=$rsEstados['sigla']?>
                                            </option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="itens_formulario">
                            <div class="titulo-item-formulario">
                                DATA NASCIMENTO:
                            </div>
                            <div class="campo-formulario">
                                <input type="text" value="<?=@$data_nascimento?>" name="txt-data-nascimento" required>
                            </div>
                        </div>
                        <div class="itens_formulario">
                            <div class="titulo-item-formulario">
                                SEXO:
                            </div>
                            <div class="campo-formulario">
                                <input class="radio" type="radio" value="F" name="rd-opcoes" required <?=$chkFeminino?>>Feminino
                                
                                <input class="radio" type="radio" value="M" name="rd-opcoes" required <?=$chkMasculino?>>Masculino
                            </div>
                        </div>
                        <div class="itens_formulario-obs">
                            <div class="titulo-item-formulario-obs">
                                OBS:
                            </div>
                            <div class="campo-formulario-obs">
                                <textarea name="txt-obs" required><?=@$obs?></textarea>
                            </div>

                        </div>
                        FOTO:
                        <div id="foto">
                            <img src="bd/arquivos/<?=$nomeFoto?>" alt="foto">
                        </div>
                        <div class="itens_formulario-botoes">
                            <input class="botao" type="submit" value="<?=$botao?>" name="btn-salvar">
                            <input type="submit" value=" Limpar" name="btn-limpar">
                        </div>
                    </form>
                    <br>
                    <br>
                    <br>
                    
                </div>
                <div class="tabela">
                    <h1 class="tabela-titulo"> consulta de contatos</h1>
                    <?php
                                $sql = "select tblcontatos.*, tblestado.sigla, tblestado.descricao 
                                from tblcontatos inner join tblestado on tblestado.codigo = tblcontatos.codestado";

                                $delete = "delete";
                                $editar = "editar";
                            
                                $select = mysqli_query($conexao, $sql);
                            
                                while($rsContatos = mysqli_fetch_array($select)){
                            
                          /*  
                            Exemplos de funções que convertem a resposta do banco de dados em um formato de dados para manipulação
                            
                                mysqli_fetch_array()
                                mysqli_fetch_assoc()
                                mysqli_fetch_object()*/
                                
                            
                    ?>
                    <div class="campo-linha">
                        <div class="campo-tabela">
                            <h4>nome</h4>
                            <div class="campo-item">
                                <?=$rsContatos['nome']?>
                            </div>
                        </div>
                        <div class="campo-tabela">
                             <h4>telefone</h4>
                            <div class="campo-item">
                                <?=$rsContatos['telefone']?>
                            </div>
                        </div>
                        <div class="campo-tabela">
                             <h4>Celular</h4>
                            <div class="campo-item"><?=$rsContatos['celular']?></div>
                        </div>
                        <div class="campo-tabela">
                             <h4>Email</h4>
                            <div class="campo-item"><?=$rsContatos['email']?></div>
                        </div>
                        <div class="campo-tabela">
                             <h4>ESTADO</h4>
                            <div class="campo-item"><?=$rsContatos['sigla']." - ".$rsContatos['descricao']?></div>
                        </div>
                        <div class="campo-tabela">
                             <h4>Foto</h4>
                            <div class="campo-item">
                             <img src="bd/arquivos/<?=$rsContatos['foto']?>" alt="img">
                                
                            </div>
                        </div>
                        <div class="campo-tabela">
                             <h4>Opções</h4>
                            <div class="campo-item">
                                <div> 
                                    <img src="img/lupa.png" class="visualizar" onclick="visualizarDados(<?=$rsContatos['codigo']?>);">
                                </div>
                                <div>
                                    <a href="formulario.php?modo=editar&codigo=<?=$rsContatos['codigo']?>">
                                        <img src="img/checkbox-pen-outline.png">
                                    </a>
                                </div>
                                <div>
                                    <a onclick="return confirm('Deseja realmente excluir esse registro')" href="bd/deletar.php?modo=excluir&codigo=<?=$rsContatos['codigo']?>&nomeFoto=<?=$rsContatos['foto']?>">
                                        <img src="img/cancelar.png">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                                }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>