<?php
session_start();

if (isset($_SESSION['session_id'])) {
    unset($_SESSION['session_id']);
    session_destroy();
}
header('Location: login.php');
exit;