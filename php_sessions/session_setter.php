<!-- Session Setter -->
<?php
    session_start();
    //set the value of name, if we have a session
    if (isset($_SESSION['name'])) {
        $name = $_SESSION['name'];
    } else {
        $name = '';
    }
    //set the value of age, if we have a session
    if (isset($_SESSION['age'])) {
        $age = $_SESSION['age'];
    } else {
        $age = '';
    }
    //set the value of occupation, if we have a session
    if (isset($_SESSION['occupation'])) {
        $occupation = $_SESSION['occupation'];
    } else {
        $occupation = '';
    }
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
    <form action="session_reader.php" method="get">
        <input type="text" name="name" placeholder="Enter name here" value=<?= $name ?> ><br>
        <input type="text" name="age" placeholder="Enter age here" value=<?= $age ?> ><br>
        <input type="text" name="occupation" placeholder="Enter occupation here" value=<?= $occupation ?> ><br>
        <button>Submit</button>
    </form>
</body>
</html>