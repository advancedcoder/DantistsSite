<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="stomatology web-site">
        <title><?php echo $page_title; ?></title>
        <link type="text/css" rel="stylesheet" href="/style/style.css">
        <link type="text/css" rel="stylesheet" href="/style/formstyle.css">
        <link type="text/css" rel="stylesheet" href="style/redirectstyle.css">
        <script src="/script/animation.js"></script>
    </head>
    <body>
        <?php 
        include ("Partial/header.php");
        include ($page_content);
        include ("Partial/footer.php");
        ?>
    </body>
</html>