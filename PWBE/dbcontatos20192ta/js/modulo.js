function validarEntrada(caracter,typeBlock){
    //charCode converte o caracter digitado em ascii
        
    //Serve para padronizar a conversão em ascii em todas as versões de navegadores.
    //Os que são baseados em janela ou não
    
    var tipo = typeBlock;
    
    if(window.event){
        var asc = caracter.charCode;
    }else{
        var asc = caracter.which;
    }

        //valida apenas a digitação de letra
    if(tipo == "numeric"){
       if(asc >=48 && asc<=57){

            //cancela da tecla digitada

            return false;
        }
    
    }else if(tipo == "string"){
        if(asc < 48 || asc > 57){
            return false;
        }
    }
}

function mascaraFone(obj,caracter){
   
    if(validarEntrada(caracter, "string") == false){
        return false;
    }else{
        var input = obj.value;
        var id = obj.id;
        var resultado = input;

        if(input.length == 0){
            resultado = "(";
        }else if(input.length == 4){
            resultado += ")";
        }else if(input.length == 9){
            resultado += "-";
        }else if(input.length == 14){
            return false;
        }

        document.getElementById(id).value = resultado;
        }
}