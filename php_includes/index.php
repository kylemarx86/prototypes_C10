<?php
    //feature set 1
    $a = 1;
    $b = 5;
    include('includes/data.php');
    $result = $a * $b;
    print("<br>Result is $result");
?>

<?php
    //feature set 2
    $c = 2;
    include('includes/data2.php');          //will run      c = 4
    include_once('includes/data.php');      //won't run     c = 4
    include('includes/data2.php');          //will run      c = 8
    $result2 = $c;
    print("<br>Result 2 = $result2");
?>