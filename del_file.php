<?php
    
    $path = htmlspecialchars($_POST['del_item']);
    unlink("$path");
    header('Location: '.'/file_system.php', true, 302);
?>