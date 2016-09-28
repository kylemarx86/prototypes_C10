<!-- Session Reader -->
<?php
    session_start();
    $_SESSION['name'] = $_GET['name'];
    $_SESSION['age'] = $_GET['age'];
    $_SESSION['occupation'] = $_GET['occupation'];
//    print_r($_SESSION);

    header('location: session_setter.php');

?>