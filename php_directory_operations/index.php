<html>
<head></head>
<body>
<div id="image_container">
    <?php
    //feature set 1
    $image_list = glob("images/*.jpg");

//    $buffer = '';
//    foreach ($image_list as $image){
//        $buffer = $buffer."<img src='$image'>";
//    }
//    print($buffer);



    foreach ($image_list as $image){
        ?><img src='<?=$image?>'><?php
    }
    ?>



</div>
</body>
</html>
