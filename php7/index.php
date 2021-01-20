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


    while ($publicacao = $busca->fetch_array()){
        echo '<hr/>';
        echo utf8_encode($publicacao["ra_conteudo"].'<br/><br/><br/><br/><br/><br/><br/><br/>');
    }



?>

</body>
</html>