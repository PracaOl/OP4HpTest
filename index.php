<?php
require_once('class/user.class.php');

$user = new User('jkowalski', 'tajnehaslo');

echo '<pre>';
var_dump($user);

?>