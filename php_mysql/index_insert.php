<!-- index_insert.php -->
<?php
    print_r($_POST);

    require('mysql_connect.php');
//    $query = "INSERT INTO `todo_items` SET `title`='wash the dishes', `details`='wash the dishes before company comes over', `timestamp`='2016', `user_id`='2'";
    $query = "INSERT INTO `todo_items` SET `title`='".$_POST['title']."', `details`='".$_POST['details']."', `timestamp`='".$_POST['timestamp']."', `user_id`='2'";
    $result = mysqli_query($conn, $query);

    print_r(mysqli_affected_rows($conn));
?>