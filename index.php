<?php
require_once("config.php");
require_once('class/user.class.php');

$user = new User('jkowalski', 'tajnehaslo');
/* if ($user->register()) {
    echo "Zarejestrowano poprwanie";
} else {
    echo "Błąd rejestracji użytkownika";
} */
if ($user->login()) {
    echo "ZAlogowano poprawnie";
} else {
    echo "Błędny login lub hasło";
}
$user->login();
echo '<pre>';
var_dump($user);

?>