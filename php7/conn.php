
<?php
$dbhost = 'localhost';
$dbname = 'publicacoes';
$dbuser = 'root';
$dbpassword = '';

$conn =  new mysqli($dbhost, $dbuser, $dbpassword, $dbname);

if($conn->connect_errno){
    echo "falha na conexão: (".$conn->connect_errno.") ".$conn->connect_error;
}

?>
