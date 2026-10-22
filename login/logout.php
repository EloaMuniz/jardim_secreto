<?php
// Encerra a sessão e volta para a página inicial
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$_SESSION = array();
session_destroy();

header("Location: ../index.php");
exit();
