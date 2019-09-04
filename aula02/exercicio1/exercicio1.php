<?php
/*Comentário*/
/*
    $_GET[''] - resgata um valor enviado pelo formulario via GET
    $_POST[''] - resgata um valor enviado pelo formulario via POST
    isset() - verifica se existe o elemento, variavel, objeto, etc...
*/

//verifica a existencia do botao calcular no GET do formulario (URL)
$media = 0; //variavel criada para existir na abertura da tela e assim resolver o erro de undefined variable
//poderiamos dar o isset na variavel dentro do html
//ou colocar um @ o que é menos indicado pois ele não resolve o erro, somente o oculta.
$mensagem = "";
$erro1 = "";
if(isset($_ GET['btnCalcular']))
{
//resgatando os valores digitados pelo usuario
    $nota1 = $_GET['txtNota1'];
    $nota2 = $_GET['txtNota2'];
    $nota3 = $_GET['txtNota3'];
    $nota4 = $_GET['txtNota4'];
    
    //tratamento de caixa de aviso
    if($nota1=="" || $nota2=="" || $nota3=="" || $nota4==""){
        $erro1 = "Erro: favor informar todas as notas!";
    }else{
        
        if(is_numeric($nota1) && is_numeric($nota2) && is_numeric($nota3) && is_numeric($nota4)){
            

    //Calcula o resultado da média das notas
    $media = ($nota1 + $nota2 + $nota3 + $nota4)/4;
    
    /*
        echo(); serve para mostrar na tela
        assim como
        print_r();
        
        o var_dump(); - exibe o conteudo de uma variavel e as informações técnicas da variavel, por exemplo (tipo de dados, qtde de espaço usado)
    */
    
    //echo($media);
    
    /*print_r("<br>"."usando print_r".$media);*/
    
    //var_dump($media);
        } else{
            //echo("Erro: Digitar somente números");
            
            /*
            echo("<script>
                    alert('Erro: digitar somente números');
                </script>    
                ");
            */
            $mensagem = "digite somente numeros";
        }
    }    
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Exercicio 1
        </title>
        <meta charset="utf-8">
        <style type="text/css">
            h1,#resultado{
                margin: 0px;
                text-align: center;
                margin-bottom: 50px;
                background-color:black;
                color:#ffffff;
            }
            body{
                margin: 0px;
            }
            #formulario{
                background-color: #999999;
            }
            .conteudo{
                width: 1000px;
            }
            .center{
                margin: auto;
            }
            .caixa_formulario{
                width: 500px;
                height: auto;
                background-color: #ffffff;
                margin: auto;
            }
            form{
                margin-left: 130px;
            }
            .botao{
                margin-left: 90px;
                margin-bottom: 30px;
                background-color: #000000;
                color:#ffffff;
            }
            #erro{
                color:#ff0000;
                text-transform: uppercase;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div id="formulario">
            <div class="conteudo center">
                <div class="caixa_formulario">
                    <h1>
                       CALCULO MEDIA
                    </h1>
                    <h1><a href="http://localhost/ds2t20192/pedro/aula02/exercicio1/exercicio1.php?">Novo calculo</a></h1>
                    <form name="medias" method="get" action="exercicio1.php">
                        Nota 1:
                        <input type="text" name="txtNota1" value="<?php echo (@$nota1); ?>">
                        <br><br>
                        Nota 2:
                        <input type="text" name="txtNota2" value="<?php echo (@$nota2); ?>">
                        <br><br>
                        Nota 3:
                        <input type="text" name="txtNota3" value="<?php echo (@$nota3); ?>">
                        <br><br>
                        Nota 4:
                        <input type="text" name="txtNota4" value="<?=@$nota4?>">
                        <br><br>
                        <input class="botao" type="submit" name="btnCalcular" value="Calcular">
                        
                    </form>
                    <h2 id="erro">
                        <?php echo($mensagem); ?>
                        <?php echo($erro1); ?>
                    </h2>
                    <h1 id="resultado">
                        a média é: <?php  echo($media); ?>
                    </h1>   
                </div>
            </div>
        </div>
    </body>
</html>