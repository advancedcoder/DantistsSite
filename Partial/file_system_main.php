<script src="http://code.jquery.com/jquery-2.0.2.min.js"></script>
<script>
    $(document).ready(function(){
        <?php if(!isset($_POST['del_item'])){
        ?>PopUpHide();
        <?php } ?>
    });
    function PopUpShow(){
        $("#popup1").show();
    }
    function PopUpHide(){
        $("#popup1").hide();
    }

    function custom_submit() {
        document.forms["moveInDirs"].submit();
    }
    function custom_submit_root() {
        document.forms["moveInDirsRoot"].submit();
    }
</script>

<main>
    <div id="main_head">
        <p>File manager:</p>
    </div>
    <div id="main-middle-form" style="overflow:auto"> 

        <?php
        if (!isset($_POST["dir"])) {
            $_POST["dir"] = ".";
        }

        $opened_dir = opendir($_POST['dir']);

        while($file = readdir($opened_dir)) {
            if (is_dir($_POST['dir']."/".$file) && $file != "..") {
                $dirs[] = $file;
            }

            if (is_file($_POST['dir']."/".$file)) {
                $files[] = $file;
            }
        }

        closedir($opened_dir);
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Size</th>
                    <th>Cr.Date</th>
                    <th>Func</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if (isset($dirs)) {
                    foreach ($dirs as $key => $value) {
                        if($value == ".") { ?>
                <tr>
                    <td>
                        <form name="moveInDirsRoot" method="post" action="">
                            <?php if ($_POST['dir'] != '.') {
                            $pos=strrpos($_POST["dir"], "/");
                            $newdir=substr($_POST["dir"], 0, $pos);
                        } else {
                            $newdir = ".";
                        }?>
                            <input type="hidden" name="dir" value="<?php echo $newdir ?>">
                            <a style="cursor:pointer" onclick="custom_submit_root();">../</a>
                        </form> 
                    </td>
                    <td colspan="3"><input type="text" form="create" name="new_dir_name" placeholder="Directory name"></td>
                    <td>
                        <form id="create" action="dir_creation.php" method="post">
                            <input type="hidden" name="path" value="<?php echo $_POST['dir'] ?>">
                            <input type="submit" value="Create" class="btnDel" style="background-color:#007bff !important;">
                        </form>
                    </td>
                </tr>
                <?php }

                        else {?>
                <tr>
                    <td>
                        <form name="moveInDirs<?php echo $value?>" method="post" action="">
                            <input type="hidden" name="dir" value="<?php echo $_POST['dir'].'/'.$value;?>">
                            <a onclick="document.forms['moveInDirs<?php echo $value?>'].submit();" style="cursor:pointer">
                                <img class="type" alt="" src="/img/folder.png"><?php echo $value; ?>
                            </a>
                        </form>
                    </td>
                    <td>Folder</td>
                    <td><?php echo get_file_size(get_dir_size($_POST['dir'].'/'.$value)); ?></td>
                    <td><?php echo date("d.m.Y", filectime($_POST['dir'].'/'.$value)); ?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="del_item" value="<?php echo $value?>">
                            <input type="submit" class="btnDel" value="Delete">
                        </form>
                    </td>
                </tr>
                <?php

                             }
                    }

                    if (isset($files)) {
                        foreach ($files as $key => $value) { ?>
                <tr>
                    <td><img class="type" alt="" src="/img/file.png"> <?php echo $value;?></td>
                    <td>File</td>
                    <td><?php echo get_file_size(filesize($_POST['dir']."/".$value)); ?></td>
                    <td><?php echo date("d.m.Y", filectime($_POST['dir']."/".$value)); ?></td>
                    <td>
                        <form action="del_file.php" method="post">
                            <input type="hidden" name="del_item" value="<?php echo $_POST['dir'].'/'.$value?>">
                            <input type="submit" value="Delete" class="btnDel">
                        </form>
                    </td>
                </tr>
                <?php }}
                } ?>


            </tbody>
        </table>

    </div>
</main>

<div class="b-popup" id="popup1">
    <div class="b-popup-content">
        <?php 
        $message = "";
        $path = $_POST['del_item'];
        if (count(scandir($path))>2) {
            $message = "Directory isn't empty. Are you sure you want to delete?";
        }
        else {
            $message = "Directory is empty. Are you sure you want to delete?";
        }

        ?>
        <?php echo $message; ?>
        <form action="del_dir.php" id="delform" method="post">
            <input type="hidden" name="del_item" value="<?php echo $_POST['dir'].'/'.$path?>">
            <span class="span">
                <input type="submit" value="Ok" class="btnDel">
                <input type="button" value="Cancel" class="btnDel" onclick="PopUpHide()" style="background-color:#007bff !important;">
            </span>
        </form>
    </div>
</div>


<?php 
    function get_file_size ($size) {

    if ($size < 1024) {
        $size .= " B";
    }
    elseif ($size >= 1024) {
        $size /= 1024;
        $size = round($size, 2);
        $size .= " KB";
    }
    elseif ($size >= 1024 * 1024) {
        $size /= 1024 * 1024;
        $size = round($size, 2);
        $size .= " MB";
    }
    else {
        $size /= 1024 * 1024 * 1024;
        $size = round($size, 2);
        $size .= " GB";
    }

    return $size;
}

                   function get_dir_size ($dir) {
                       $size = 0;

                       $opened_dir = opendir($dir);

                       while (($files = readdir($opened_dir)) !== false) {
                           if ($files != "." && $files != "..") {
                               $path = $dir . "/" . $files; 
                               if(is_dir($path)) {
                                   $size += get_dir_size($path);
                               } 
                               elseif(is_file($path)) 
                               {  
                                   $size += filesize($path);  
                               } 
                           }
                       }

                       closedir($opened_dir);

                       return $size;
                   }

?>


