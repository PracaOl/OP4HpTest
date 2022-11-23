<?php
require_once('config.php');
if (isset($_REQUEST['login']) && isset($_REQUEST['password'])) {
    if (empty($_REQUEST['login']) || empty($_REQUEST['password']) || empty($_REQUEST['firstName']) || empty($_REQUEST['lastName'])) {
        $twig->display('message.html.twig', ['message' => "Nie podano wymaganej wartości"]);
        exit();
    }
    $user = new User ($_REQUEST['login'], $_REQUEST['password']);
    $user->setFirstName($_REQUEST['firstName']);
    $user->setLastName($_REQUEST['lastName']);
    if ($user->register()) {
        //echo "Zarejestrowano poprawnie";
        $twig->display('message.html.twig', ['message' => "Zarejestrowano poprawnie"]);
    } else {
        //echo "Błędna rejestracja";
        $twig->display('message.html.twig', ['message' => "Błędna rejestracja"]);
    }
}  else {
    $twig->display('register.html.twig');
}
?>