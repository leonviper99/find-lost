<?php
include 'backend/connect.php';
session_start();
include 'All.classes.php';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Page Title</title>
        <?php
        $root = $_SERVER['HTTP_HOST'];
        //get page id | use defaul if none, or if exists update vars
        $pageId = $_GET['id'];
        $title = $_GET['title'];
        if($pageId == '' && $title == '') {
            $title = 'Default Title';
        }
        ?>
        <!-- Twitter Share -->
        <meta name="twitter:title" content="<?php echo $title; ?>">
        <meta name="twitter:image" content="http://<?php echo $root; ?>/img/share/<?php if($pageId != ''){ echo $pageId.'.jpg'; } else { echo 'default.jpg'; } ?>">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@Mysite">
        <meta name="twitter:creator" content="@mytwitterhandle">
        <meta name="twitter:description" content="Description">
        <!-- Facebook/LinkedIn Share -->
        <meta property="og:type" content="website" />
        <meta property="og:description" content="Description" />
        <meta property="og:title" content="<?php echo $title; ?>" />
        <meta property="og:image" content="http://<?php echo $root; ?>/img/share/<?php if($pageId != ''){ echo $pageId.'.jpg'; } else { echo 'default.jpg'; } ?>" />
        <meta property="og:url" content="http://<?php echo $root; ?>/link.php<?php if($pageId != ''){ echo '?id='.$pageId; } ?>" />



        <meta property="og:url" content="http://www.rangisha.com/">
    <meta property="og:title" content="Rangisha ibyabuze / ibyatoraguwe">
    <meta property="og:description" content="rangisha ni urubuga rugufasha gushaka no kuranga ibyabuze ibyatoraguwe kuburyo bworoshye. Rangisha ihuza uwataye nuwatoye.">

    <meta property="og:image" content="images/no_image/irangamuntu.png">
    <meta property="og:image:secure_url" content="images/no_image/irangamuntu.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">
    </head>
    <body>
        <div>Dynamic body Content</div>
    </body>
</html>