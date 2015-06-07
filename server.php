<?php
require_once('connection_bd/bd.php');
$prediction1=$_POST["name"];
$prediction=(", ".$prediction1);

$name = $_FILES['image']['name'];
$text_name = preg_replace("/[^a-zA-Z0-9,.!? ]+/ui","",(string)$_POST['name']);//удаление из предсказания всего кроме
$lang_name=strlen($text_name);
if ($lang_name<=15 ){
    echo "<script> alert ('Enter your prediction is greater than 15 characters, using ' +
 'only the English alphabet and some signs -. ,! ? .');</script>";
}
if ($lang_name>=80 ){
    echo "<script> alert ('Your prediction should not exceed 80 characters, using only the English alphabet and ' +
 'some signs -. ,! ? .');</script>";
}
if ($img = preg_match('/\.(?:jp(?:e?g|e|2)|gif|png|tiff?|bmp|ico)$/i', $name)) {
   // echo($img);
    }
else {
    echo "<script> alert ('Please , insert a picture');</script>";
}
if ($lang_name > 15 && $lang_name < 80 && $img == 1) {//Если длинна  15 < предсказания < 80 и картинка подгружена
    $tmp_name = $_FILES['image']['tmp_name'];
    copy($tmp_name, "img/$name");
    $sql = mysqli_query($link, "INSERT INTO `prediction`(`prediction`,`url`)
                          VALUES ('" . $prediction . "','img/$name' )");
    echo "<script> alert ('Predicting added');</script>";
    echo "<script>location.replace('index.php');</script>";
}

    ?>
<?php require_once('head/head.php');?>
<body>
<?php require_once('header/header.php');?>
<div  class="content">
    <?php require_once('L_R_pumpkins/Left_pumpkin.php');?>
    <?php require_once('L_R_pumpkins/Right_pumpkin.php');?>
    <div class="form">
        <form enctype="multipart/form-data" method="post" action="server.php">
            <input type="text" class="add_Name"  name="name" autocomplete="off" placeholder="Your prediction..."   >
            <input lang="en" class="file"  type="file" name="image" value="Upload file">
            <input class="btn" type="submit" value="Upload">
        </form>
        <img class="logo" src="img/23.png"/>
    </div>
</div>
</body>

