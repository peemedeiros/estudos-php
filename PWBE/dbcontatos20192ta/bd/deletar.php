<?php

/*verifica a existencia da variavel modo*/
if(isset($_GET['modo'])){
    /*valida se a variavel modo tem a ação de excluir*/
    if($_GET['modo']=='excluir'){
        
        /*importa o arquivo de conexão com o bd*/
        require_once('conexao.php');
        /*Abre a conexão com o banco Mysql*/
        $conexao = conexaoMysql();
        
        $codigo=$_GET['codigo'];
        $nomeFoto=$_GET['nomeFoto'];
        
        $sql = "delete from tblcontatos where codigo =".$codigo;
        
        if(mysqli_query($conexao, $sql)){

            //apaga um arquivo
            unlink('arquivos/'.$nomeFoto);
            header('location:../formulario.php');
        }
        else    
        {
            echo(" NAO CADASTROU");
        }
    }
}

?>