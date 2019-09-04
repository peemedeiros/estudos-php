<?php

$nome  = $_GET['txtNome'];
echo($nome);


?>
<DOCTYPE html>
<html>
    <head>
        <title>
            Exercicio 01
        </title>
        <meta charset="utf-8">
        <style type="text/css">
            ul{
                width: 400px;
                height: 50px;
                float: left;
                background-color: #ccc;
                border:solid 1px #000;
                list-style: none;
            }
            li{
                width: 100px;
                height: 50px;
                float: left;
                padding-top: 15px;
                box-sizing: border-box;
                text-align: center;
                margin: auto;
            }
            li:hover{
                transition:1s;
                background-color: #fff;
            }
        </style>
    </head>
    <body>
        <nav>
            <ul>
                <li>HOME</li>
                <li>HOME</li>
                <li>HOME</li>
                <li>HOME</li>
            </ul>
        </nav>
        <form name="frmExercicio1" method="get" action="exercicio1.php">
            NOME:
            <input type="text" name="txtNome" value="" size="50">
            <input type="submit" name="btnEnviarNome" value="Enviar">
        <!--
            name - nome do elemento html

            method - existem apeas 2 metodos, o GET e o POSt
                GET - envia os dados digitados no formulario para a URL da pagina
                POST - enviam os dados digitados no formulario em cache no navegador

            action - para onde serão enviados os dados.
        -->
        </form>
    </body>
</html>