<?php
//importa o arquivo de conexão
require_once('bd/conexao.php');

//chamada para a function de conexão com o Mysql
$conexao = conexaoMysql();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Formulario
        </title>
        <meta charset="utf-8">
        <style type="text/css">
            h4{
                margin: 0px;
                padding: 0px;
                width: inherit;
                height: 40px;
                box-sizing: border-box;
                padding-top: 8px;
                background-color: #dadfe8;
                border:solid 1px #000;
                margin-bottom: 1px;
            }
            body{
                font-family: verdana;
            }
            .caixa-principal{
                width: 100%;
                height: 720px
                
            }
            .conteudo{
                width: 1200px;
                height: inherit;
            }
            .center{
                margin-left: auto;
                margin-right: auto;
            }
            .formulario{
                width: 500px;
                height: inherit;
                box-shadow: 8px 8px 15px #999;
                padding-top: 2px;
                border: solid 1px #e3e3e3;
                border-radius: 8px;
                margin-bottom: 20px;
            }
            h1,.tabela-titulo{
                margin: 0px;
                padding: 0px;
                padding-top: 16px;
                height: 58px;
                width: 490px;
                text-align: center;
                box-sizing: border-box;
                background-color: #82b0fa;
                margin-bottom: 2px;
                border-radius: 8px;
                color: #fff;
                font-size: 20px;
            }
            .tabela-titulo{
                width: inherit;
            }
            .itens_formulario, .itens_formulario-obs, .itens_formulario-botoes{
                width: inherit;
                height: 80px;
            }
            .titulo-item-formulario, .titulo-item-formulario-obs{
                width: 150px;
                height: inherit;
                background-color: #d5d7db;
                box-sizing: border-box;
                padding-top: 30px;
                font-size: 16px;
                text-align: center;
                float: left;
                border: solid 2px #ffffff;
            }
            .itens_formulario-obs{
                height: 150px;
            }
            .titulo-item-formulario-obs{
                padding-top: 50px;
            }
            .campo-formulario,.campo-formulario-obs{
                width: 350px;
                height: inherit;
                float: left;
                box-sizing: border-box;
                padding-top: 30px;
                padding-left: 5px;
            }
            .campo-formulario-obs{
                padding-top: 13px;
            }
            textarea{
                width: 300px;
                height: 110px;
                resize: none;
            }
            .itens_formulario-botoes{
                height: 30px;
                padding-top: 3px;
                padding-left: 3px;
                box-sizing: border-box;
            }
            .itens_formulario-botoes .botao{
                margin-right: 50px;
            }
            .tabela{
                width:1150px;
                height: auto;
                min-height: 150px;
                box-shadow: 8px 8px 15px #999;

            }
            .campo-tabela{
                width: 230px;
                height: 88px;
                float:left;
                text-align: center;
                box-sizing: border-box;
            }
            .campo-linha{
                width: inherit;
                height: inherit;
            }
            .campo-item{
                width: inherit;
                height: 45px;
                border:solid 1px #000;
                padding: 1px;
                box-sizing: border-box;
                margin-right: 1px;
                padding-top: 9px;
            }
            .campo-item div{
                width: 25px;
                height: 25px;
                float: left;
                margin-right: 5px;
            }
            .campo-item div img{
                width: inherit;
                height: inherit;
            }
        </style>
    </head>
    <body>
        <div class="caixa-principal">
            <div class="conteudo center">
                <div class="formulario center">
                    <h1 class="center">
                        CADASTRO DE CONTATOS
                    </h1>
                    <!--
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
                    -->
                    <form name="frm-contatos" method="post" action="bd/inserir.php">
                        <div class="itens_formulario">
                            <div class="titulo-item-formulario">
                                NOME:
                            </div>
                            <div class="campo-formulario">
                                <input type="text" value="" name="txt-nome" placeholder="Digite seu nome" required>
                            </div>
                        </div>
                        <div class="itens_formulario">
                            <div class="titulo-item-formulario">
                                TELEFONE:
                            </div>
                            <div class="campo-formulario">
                                <input type="text" value="" name="txt-telefone" required>
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
                    <div class="campo-linha">
                        <div class="campo-tabela">
                            <h4>nome</h4>
                            <div class="campo-item"></div>
                        </div>
                        <div class="campo-tabela">
                             <h4>telefone</h4>
                            <div class="campo-item"></div>
                        </div>
                        <div class="campo-tabela">
                             <h4>Celular</h4>
                            <div class="campo-item"></div>
                        </div>
                        <div class="campo-tabela">
                             <h4>Email</h4>
                            <div class="campo-item"></div>
                        </div>
                        <div class="campo-tabela">
                             <h4>Opções</h4>
                            <div class="campo-item">
                                <div> <img src="img/lupa.png"></div>
                                <div><img src="img/checkbox-pen-outline.png"></div>
                                <div> <img src="img/cancelar.png"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>