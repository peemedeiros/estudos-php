<?php
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
        if($tamanho_arquivo < 2048){

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

            $diretorio = "arquivos/";

            if(move_uploaded_file($arquivo_temp, $diretorio.$foto)){
                //verifica se o o botão esta retornando a palavra INSERIR
                
            }else{
                echo("<script> alert('Nao foi possivel enviar o arquivo para o servidor') </script>");
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
?>