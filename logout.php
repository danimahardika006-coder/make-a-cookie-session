<?php
    session_start();

    $_SESSION = [];     // harus selalu dikosongkan.
    session_destroy();

    header("Location: login.php");
    exit;
    
?>