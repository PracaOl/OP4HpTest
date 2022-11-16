<?php
require_once('class/user.class.php');

$user = new User('jkowalski', 'tajnehaslo');
//$user->register();
$user->login();
echo '<pre>';
var_dump($user);

?>