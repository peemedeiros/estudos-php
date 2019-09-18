<?php
//importa o arquivo de conexão
require_once('bd/conexao.php');

//chamada para a function de conexão com o Mysql
$conexao = conexaoMysql();
/*valida se existe a variavel modo*/
if(isset($_GET['modo'])){
    /*valida se modo é editar*/
    if($_GET['modo']=='editar'){

        $codigo = $_GET['codigo'];

        $selecionar = "select * from tblcontatos where codigo=".$codigo;
        
        $select = mysqli_query($conexao, $selecionar);
        
        if($rsConsulta = mysqli_fetch_array($select)){
            
            $nome = $rsConsulta['nome'];
            $telefone = $rsConsulta['telefone'];
            
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
        <script src="js/modulo.js"></script>
    </head>
    <body>
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
                    <form name="frm-contatos" method="post" action="bd/inserir.php">
                        <div class="itens_formulario">
                            <div class="titulo-item-formulario">
                                NOME:
                            </div>
                            <div class="campo-formulario">
                                <input type="text" value="<?=$nome?>" name="txt-nome" placeholder="Digite seu nome" onkeypress="return validarEntrada(event,'numeric');" required >
                            </div>
                        </div>
                        <div class="itens_formulario">
                            <div class="titulo-item-formulario">
                                TELEFONE:
                            </div>
                            <div class="campo-formulario">
                                <input id="telefone" type="text" value="<?=$telefone?>" name="txt-telefone" placeholder="0xx 4002-8922" onkeypress="return mascaraFone(this,event);" required>
                            </div>

                        </div>
                        <div class="itens_formulario">
                            <div class="titulo-item-formulario">
                                CELULAR:
                            </div>
                            <div class="campo-formulario">
                                <input type="text" value="" name="txt-celular" required>
                            </div>
                        </div>
                        <div class="itens_formulario">
                            <div class="titulo-item-formulario">
                                EMAIL:
                            </div>
                            <div class="campo-formulario">
                                <input type="email" value="" name="txt-email" required>
                            </div>
                        </div>
                        <div class="itens_formulario">
                            <div class="titulo-item-formulario">
                                DATA NASCIMENTO:
                            </div>
                            <div class="campo-formulario">
                                <input type="text" value="" name="txt-data-nascimento" required>
                            </div>
                        </div>
                        <div class="itens_formulario">
                            <div class="titulo-item-formulario">
                                SEXO:
                            </div>
                            <div class="campo-formulario">
                                <input class="radio" type="radio" value="F" name="rd-opcoes" required> feminino
                                <input class="radio" type="radio" value="M" name="rd-opcoes" required>masculino
                            </div>
                        </div>
                        <div class="itens_formulario-obs">
                            <div class="titulo-item-formulario-obs">
                                OBS:
                            </div>
                            <div class="campo-formulario-obs">
                                <textarea name="txt-obs" required></textarea>
                            </div>

                        </div>
                        <div class="itens_formulario-botoes">
                            <input class="botao" type="submit" value=" Salvar" name="btn-salvar">
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
                                $sql = "select * from tblcontatos";
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
                             <h4>Opções</h4>
                            <div class="campo-item">
                                <div> <img src="img/lupa.png"></div>
                                <div>
                                    <a href="formulario.php?modo=editar&codigo=<?=$rsContatos['codigo']?>">
                                        <img src="img/checkbox-pen-outline.png">
                                    </a>
                                </div>
                                <div>
                                    <a onclick="return confirm('Deseja realmente excluir esse registro')" href="bd/deletar.php?modo=excluir&codigo=<?=$rsContatos['codigo']?>">
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