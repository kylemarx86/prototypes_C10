<!-- index_select.php -->
<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once('mysql_connect.php');
    $query = "SELECT * FROM `todo_items` WHERE `user_id`='2'";
    $result = mysqli_query($conn, $query);
//    mysqli_num_rows($result);
//    print_r(mysqli_num_rows($result));
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            print_r($row);
            print("<br>");
        }
    }
?>