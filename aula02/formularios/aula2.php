<!DOCTYPE html>
<html>
    <head>
        <title>
            AULA 2
        </title>
        <meta charset="utf-8">
        <style>
            textarea{
                resize: none;
            }
        </style>
    </head>
    <body>
        <form name="formulario" method="get" actin="aula2.php">
            <input type="text" name="txtNome" value="" size="50" maxlength="150">
            <br><br>
            Estados:
            <select name="sltEstados">
                <option value="sp">SÃO PAULO</option>
                <option value="mg">MINAS GERAIS</option>
                <option value="rj">RIO DE JANEIRO</option>
                <option value="" selected>SELECIONE UF</option>
            </select>
            <br><br>
            Selecione um sexo:
            <input type="radio" name="rdosexo" value="f" checked>Feminino
            <input type="radio" name="rdosexo" value="m">Masculino
            <!--o elemento radio é o unico elemento que é obrigatório ter o mesmo NAME em todas as opções, caso o contrário o usuário poderá selecionar mais de uma opção-->
            <br><br>
            Selecione os idiomas:
            <input type="checkbox" name="chkPort" value="pt" checked> Português
            <input type="checkbox" name="chkIng" value="en"> Inglês
            <input type="checkbox" name="chkDeu" value="de"> Alemão
            <br><br>
            <textarea name="txtObs" cols="30" rows="8"></textarea>
            <br><br>
            <input type="submit" name="btnEnviar" value="enviar">
            <input type="reset" name="btnLimpar" value="clear">
        </form>
    </body>
</html>