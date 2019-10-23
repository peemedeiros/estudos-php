<?php
    //Verifica se existe a variavel modo
    if(isset($_POST['modo'])){

        //valida se o conteudo da variavel modo é visualizar
        if(strtoupper( $_POST['modo'] ) == 'VISUALIZAR'){

            //recebe o id do registro enviado pelo AJAX
            $codigo = $_POST['codigo'];


            require_once('bd/conexao.php');
            //chamada para a function de conexão com o Mysql
            $conexao = conexaoMysql();

            //script para buscar o registro no banco de dados
            $sql = "select * from tblcontatos where codigo = ".$codigo;

            $select = mysqli_query($conexao, $sql);
            //Verifica se existem dados e converte em array
            if($rsVisualizar = mysqli_fetch_array($select)){

                $nome = $rsVisualizar['nome'];
                $telefone = $rsVisualizar['telefone'];
                $celular = $rsVisualizar['celular'];
                $email = $rsVisualizar['email'];
                $dt_nasc = $rsVisualizar['dt_nasc'];
                $sexo = $rsVisualizar['sexo'];
                $obs = $rsVisualizar['obs'];

            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>modal</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>
                nome:
            </td>
            <td>
                <?=$nome?>
            </td>
        </tr>
        <tr>
            <td>
                telefone:
            </td>
            <td>
            <?=$telefone?>
            </td>
        </tr>
        <tr>
            <td>
                celular
            </td>
            <td>
            <?=$celular?>
            </td>
        </tr>
        <tr>
            <td>    
                email
            </td>
            <td>
            <?=$email?>
            </td>
        </tr>
        <tr>
            <td>
                data nascimento
            </td>
            <td>
            <?=$dt_nasc?>
            </td>
        </tr>
        <tr>
            <td>
                sexo
            </td>
            <td>
            <?=$sexo?>
            </td>
        </tr>
        <tr>
            <td>
                obs
            </td>
            <td>
            <?=$obs?>
            </td>
        </tr>
        
    </table>
</body>
</html>