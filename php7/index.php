<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index</title>
</head>
<body>
4ª

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
    $parte = '';
    while ($publicacao = $busca->fetch_array()){
        echo '<hr/>';

        $position_juiz[$i] = strpos($publicacao["ra_conteudo"], "JUIZ(A)");
        $position_escrivao[$i] = strpos($publicacao["ra_conteudo"], "ESCRIV");
        $quantidade_para_tras = $position_juiz[$i] - $position_escrivao[$i];

        $tamanho = strlen($publicacao["ra_conteudo"]);
        $texto = ($tamanho-$position_escrivao[$i]);

        $nome_juiz[$i] = substr($publicacao["ra_conteudo"], $position_juiz[$i], -$texto);

        $nome = "Linha de codigo";
        $parte = substr($nome, 6, -7);

        echo utf8_encode($publicacao["ra_conteudo"].'<br/><br/><br/><br/><br/><br/><br/><br/>');
        $i++;
    }
    echo '<br/><br/><br/><br/><br/>';
//    foreach ($position_juiz as $juiz){
//        echo $juiz.'<br/>';
//    }
//
//    echo '<br/><br/><br/><br/><br/><br/><br/><br/>';
//    foreach ($position_escrivao as $escrivao){
//        echo $escrivao.'<br/>';
//    }

foreach ($nome_juiz as $juiz){
    echo utf8_encode($juiz).'<br/>';
}

echo $parte;




?>

</body>
</html>