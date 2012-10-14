<?php

$hote_mysql = "localhost"; 
$base_mysql = "sshconfig_gen"; 
$user_mysql = "root"; 
$pass_mysql = "root";

try
{
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$hote_mysql.';dbname='.$base_mysql, $user_mysql, $pass_mysql);
}
catch (Exception $e)
{
        die('Error : ' . $e->getMessage());
}

?>