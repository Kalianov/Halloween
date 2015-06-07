<?php require_once('head/head.php');?>
<body>
<?php require_once('header/header.php');?>

<div  class="content">
    <?php require_once('L_R_pumpkins/Left_pumpkin.php');?>
    <?php require_once('L_R_pumpkins/Right_pumpkin.php');?>
    <div class="form">
        <form enctype="multipart/form-data" method="post" action="server.php">
            <input type="text" class="add_Name" autocomplete="off" name="name" placeholder="Your prediction..."  >
            <input class="file" type="file" name="image" value="Upload file">
            <input class="btn" type="submit" value="Upload">
        </form>
        <img class="logo" src="img/23.png"/>
    </div>
</div>
</body>