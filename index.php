<!DOCTYPE html>
<html lang="pt-br">
    <head>
    <meta charset="UTF-8" /> 
    <meta nome="viewport" content="width=device-width,initial-cale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link rel="stylesheet" href="./style.css" />
    <title>Upload</title><!--Titulo da Aba-->
    </head>
<body>

<h1>Upload de Imagem</h1>
<?php
if(isset($_POST['enviar-formulario'])):
    $formatosPermitidos = array("png","jpg","jpeg","gif");
    $extensao = pathinfo($_FILES['arquivo']['name'],PATHINFO_EXTENSION);

    if(in_array($extensao ,$formatosPermitidos)):
        $pasta = "arquivos/";
        $temporario = $_FILES['arquivo']['tmp_name'];
        $novoNome = uniqid().".$extensao";

        if(move_uploaded_file($temporario, $pasta.$novoNome)):
            $mensagem = "Upload feito com Sucesso!";
        else:
            $mensagem = "Erro, não foi possivel fazer o Upload";
        endif;
    else:
        $mensagem = "Formato Inválido";
    endif;

echo $mensagem;    

endif;
?>



<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" 
      enctype="multipart/form-data"> 
    <input type="file" name="arquivo" value="Anexar"><br><br>
    <input type="submit" name="enviar-formulario" value="Upload">
</form>

</body>
</html>