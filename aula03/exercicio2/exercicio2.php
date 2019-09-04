<?php
/*
    int
    float
    double
*/
$resultados = "";


    if(isset($_POST['btnCalcular'])){
        
       
        if($_POST['rdOpcoes']=='1'){
            
            $valor1 = $_POST['txtValor1'];

            $valor2 = $_POST['txtValor2'];  

            $resultados = $valor1 + $valor2;

            echo $resultados;
        }else if($_POST['rdOpcoes']=='2'){
        
            $valor1 = $_POST['txtValor1'];

            $valor2 = $_POST['txtValor2'];  

            $resultados = $valor1 - $valor2;
        
            echo $resultados;
        }else if($_POST['rdOpcoes']=='3'){
            $valor1 = $_POST['txtValor1'];

            $valor2 = $_POST['txtValor2'];  

            $resultados = $valor1 * $valor2;
            
            echo $resultados;
        }else if($_POST['rdOpcoes']=='4'){
            
            $valor1 = $_POST['txtValor1'];

            $valor2 = $_POST['txtValor2'];  

            $resultados= $valor1 / $valor2;
            
            echo $resultados;
        }
    }
    
   
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            exercicio 2
        </title>
        <meta charset="utf-8">
        <style type="text/css">
            #caixa{
                width: 500px;
                height: auto;
                min-height: 307px;
                border: solid 1px #000000;
                margin: auto;
                padding: 0px;
            }
            .titulo{
                color: #ffffff;
                background-color: #000000; 
                padding: 0px;
                margin:0px;
                text-align: center;
                margin-bottom: 20px;
            }
             form #valores{
                width: inherit;
                height: 60px;
                margin-left:120px;
            }
            #opcoes{
                width: 50%;
                height: 150px;
                background-color: #ccc;
                padding-left: 10px;
                padding-top: 10px;
                box-sizing: border-box;
                float: left;
            }
            .botao{
                background-color: #000000;
                color: #ffffff;
            }
            #resultado{
                background-color: #000000;
                color: #ffffff;
                width: 50%;
                height: 150px;
                float: right;
                text-align: center;
                font-size: 80px;
                box-sizing: border-box;
                padding-top: 30px;
            }
            form{
                width: inherit;
                box-sizing: border-box;
                margin: 0px;
            }
        </style>
    </head>
    <body>
        <div id="caixa">
            <h1 class="titulo">Calculadora Simples</h1>
            <div id="valores">
                <form name="calculadora" method="post" action="exercicio2.php">
                    <div id="valores">
                        Valor 1:
                        <input type="text" name="txtValor1" value="<?php echo (@$valor1)?>">
                        <br><br>
                        Valor 2:
                        <input type="text" name="txtValor2" value="<?php echo (@$valor2)?>">
                    </div>
                    <br><br>
                    <div id="opcoes">
                        <input type="radio" name="rdOpcoes" value="1">
                        Somar<br>
                        <input type="radio" name="rdOpcoes" value="2">
                        Subtrair<br>
                        <input type="radio" name="rdOpcoes" value="3">
                        Multiplicar<br>
                        <input type="radio" name="rdOpcoes" value="4">
                        Dividir<br><br>
                        <input class="botao" type="submit" name="btnCalcular" value="Calcular">
                    </div>
                </form>
            </div>
            <div id="resultado">
                <?php echo $resultados ?>
            </div>
        </div>
    </body>
</html>