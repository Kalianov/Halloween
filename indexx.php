<?php
require_once('connection_bd/bd.php');
$name = $_POST["name"];//Получаем имя из input
$text_name = preg_replace("/[^a-zA-Z ]+/ui", "", (string)$_POST['name']);//Переделываем строку если в ней имеються ,недопустимые знаки или цыфры
$mb_name = mb_convert_case($text_name, MB_CASE_LOWER, "UTF-8");//переводим в нижний регистр
$mb_name = ucwords($mb_name);//В строке каждое слово пишем с большой буквы
$lang_name = strlen($text_name);
if ($lang_name < 3) {
    echo "<script> alert ('Please only use the real name is written in English');</script>";
} //echo $mb_name;
else {
    $row_name = mysqli_query($link, "SELECT *FROM  `human` WHERE `Name`='$mb_name'");//вытаскиваем из таблицы human нужную запись

    if (($row_name->num_rows) == 0) {//если такого имени нету
        if (isset($name)) {
            $rand_prediction = mysqli_query($link, "SELECT *FROM  `prediction` ORDER BY RAND( ) LIMIT 0 , 1");//случайная запись из таблицы prediction
            $row_prediction = $rand_prediction->fetch_assoc();//перебираем эту запись в асоц масив
            //print_r($row);
            $id = $row_prediction['ID'];
            // echo($id);
            $prediction = $row_prediction['prediction'];
            $img = $row_prediction['url'];
            $sql = mysqli_query($link, "INSERT INTO `human`(`Name`,`id_prediction`)
                        VALUES ('" . $mb_name . "','$id' )");
        }
        //    echo("<br>"); echo($name."<br>");echo($prediction);
    }
    if (($row_name->num_rows) > 0) {  //если такое имя есть
        $arr_name = $row_name->fetch_assoc();
        //var_dump($g);
        $id_pr = $arr_name['id_prediction'];
        // var_dump($id_pr);
        $row_prediction = mysqli_query($link, "SELECT *FROM  `prediction` WHERE `ID`='$id_pr'");
        $arr_prediction = $row_prediction->fetch_assoc();
        //  var_dump($u);
        $prediction = $arr_prediction['prediction'];
        $img = $arr_prediction['url'];
        //    echo("<br>");echo($name."<br>");echo($prediction);echo ($img);
    };
}
?>
<?php require_once('head/head.php');?>

<body>
<?php require_once('header/header.php');?>
<div class="content">
    <?php require_once('L_R_pumpkins/Left_pumpkin.php');?>
    <?php require_once('L_R_pumpkins/Right_pumpkin.php');?>
    <div class="form">
        <form action="indexx.php" method="POST" class="forma">
            <input type="text" class="Name" autocomplete="off" placeholder="Your name..." name="name"
                   value="<?php echo($mb_name) ?>">
            <input type="submit" class="enjoy-css" value="Prediction" id="" name="">
        </form>
        <div class="prediction">
            <p><?php if ($lang_name >= 3) {
                    echo($mb_name . $prediction);
                } else {
                    echo("Try, I'm sure you can do it!");
                } ?></p>
        </div>
        <img class="logo" src="<?php if ($lang_name >= 3) {
            echo $img;
        } else {
            echo("img/Sad.png");
        } ?>"/>
    </div>
</div>
</body>
