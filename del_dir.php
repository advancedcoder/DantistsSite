<?php
    
    $path = htmlspecialchars($_POST['del_item']);
    del_dir($path);
    header('Location: '.'/file_system.php', true, 302);

    function del_dir($dir) {
        $files = array_diff(scandir($dir), ['.', '..']);
        foreach ($files as $file) {
            if (is_dir("$dir/$file")) {
                del_dir("$dir/$file");
            } else {
                unlink("$dir/$file");
            }
        }
        
        return rmdir($dir);
    }
?>