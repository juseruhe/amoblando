<?php
class Database{
    public function getconectar(){
    $localhost = 'br2tdpj1jccb2rpnbgyj-mysql.services.clever-cloud.com';
    $database = 'br2tdpj1jccb2rpnbgyj';
    $user = 'uek8fqod1uyxczew';
    $password = 'DCETEq8AvIMr8yHIlXPe';
    $link = new PDO("mysql:host=$localhost; dbname=$database", $user, $password);
    return $link;
    }
}
?>
