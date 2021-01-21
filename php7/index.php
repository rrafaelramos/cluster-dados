<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index</title>
</head>
<body>

<?php
    include ('conn.php');

//    $query = "SELECT * FROM publicacoes_fila_2020_08_02 where ra_conteudo LIKE '%4ª vara da familia e sucessoes%'";
    $query = "SELECT * FROM publicacoes_fila_2020_08_02 WHERE ra_conteudo like '%4_ vara da familia e sucessoes%'";

    $busca = $conn->query($query) or die($conn->error);

    // passa para utf-8
//    $resultado = utf8_decode($busca);

    $i = 0;
    $position_juiz = [];
    $position_escrivao = [];
    $nome_juiz = [];
    $alimentos = [];
    $divorcios = [];
    $paternidade = [];
    $inventario = [];
    $classificacao = [];

    while ($publicacao = $busca->fetch_array()){
        echo '<hr/>';

        //descobre a posição do juiz no array
        $position_juiz[$i] = strpos($publicacao["ra_conteudo"], "JUIZ(A)");
        //descobre a posição do escrivão no array
        $position_escrivao[$i] = strpos($publicacao["ra_conteudo"], "ESCRIV");

        //pega o tamanho da string para saber a posição ao qual voltar
        $tamanho = strlen($publicacao["ra_conteudo"]);
        $texto = ($tamanho-$position_escrivao[$i]);
        // pega o nome do juiz(a)
        $nome_juiz[$i] = substr($publicacao["ra_conteudo"], $position_juiz[$i], -$texto);

        if (stripos($publicacao["ra_conteudo"],utf8_decode('divórcio'))) {
            $classificacao[$i] = 'DIVORCIO';
        }elseif(stripos($publicacao["ra_conteudo"],utf8_decode('alimentos - '))){
            $classificacao[$i] = 'ALIMENTOS';
        }elseif (stripos($publicacao["ra_conteudo"],utf8_decode('investigação de paternidade'))){
            $classificacao[$i] = 'INVESTIGAÇÃO DE PATERNIDADE';
        }elseif (stripos($publicacao["ra_conteudo"],utf8_decode('inventario'))){
            $classificacao[$i] =   'INVENTÁRIO';
        }

        echo utf8_encode($publicacao["ra_conteudo"].'<br/><br/><br/><br/><br/><br/><br/><br/>');
        $i++;
    }

    $j = 0;
//while ($publicacao  = $busca->fetch_array()) {
//        echo '<hr/>';
//        echo $classificacao[$j].'<br/>';
//        echo $nome_juiz[$j].'<br/>';
//        echo $publicacao["ra_conteudo"].'<br/><br/><br/><br/>';
//        $j++;
//    }

    foreach ($classificacao as $item){
        echo $item.'<br>';
    }

    ?>
</body>
</html>