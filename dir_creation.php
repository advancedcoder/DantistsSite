<?php
    $dir = htmlspecialchars($_POST['new_dir_name']);
    $path = htmlspecialchars($_POST['path']);

    mkdir($path."/".$dir);
?>
<form name="form" action="/file_system.php" method="post">
    <input type="hidden" name="dir" value="<?php echo $path?>">
    <script>document.forms['form'].submit();</script>
</form>
