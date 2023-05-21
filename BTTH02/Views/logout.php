<?php
session_start();
include_once '../Controllers/loginController.php';
$loginController = new LoginController();
$loginController->logout();
?>
