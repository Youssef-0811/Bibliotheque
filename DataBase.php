<?php 
$db_SERVER = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'bibliotheque';

try{
    
    $conn = mysqli_connect($db_SERVER,$db_user,$db_pass,$db_name);
}
 catch(mysqli_sql_exception){
        echo 'faild to connect';
    }


?>