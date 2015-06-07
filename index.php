<?php require_once('head/head.php');?>
<body>
<div class="head">
    <img class="left_head_img" src="style/logos/grim1.png">
    <div class="title">Halloween</div>
    <div class="src"><a href="add_prediction.php"><p class="none">Add a prediction</p></a></div>
    <img class="right_head_img" src="style/logos/grim.png">
</div>
<div  class="content">
    <?php require_once('L_R_pumpkins/Left_pumpkin.php');?>
    <?php require_once('L_R_pumpkins/Right_pumpkin.php');?>
    <div class="form">
        <form action="indexx.php" method="POST">
            <input type="text" class="Name" autocomplete="off" placeholder="Your name..." name="name" >
            <input type="submit" class="enjoy-css" value="Prediction" id="" name="">
        </form>
        <div class="prediction">
            <p>Enter your name, and you will know your fate.</p>
        </div>
        <img class="logo" src="img/23.png"/>
</div>
</div>
</body>