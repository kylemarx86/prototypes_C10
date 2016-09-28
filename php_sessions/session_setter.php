<!-- Session Setter -->
<?php
    session_start();
?>
<html>
    <form action="session_reader.php">
        <input type="text" name="name" placeholder="Enter name here"><br>
        <input type="text" name="age" placeholder="Enter age here"><br>
        <input type="text" name="occupation" placeholder="Enter occupation here"><br>
        <input type="button" name="submit" value="Submit">
    </form>
</html>