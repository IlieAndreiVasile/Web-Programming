<?php
    $user = $_POST['user'];
    $password = $_POST['password'];
    $db = mysqli_connect("localhost", "root", "pass1234", "food");
    $result = mysqli_query($db, "SELECT * FROM admin WHERE user = '$user' AND password = '$password'") or die("Query failed" + mysql_error());
    $row = mysqli_fetch_array($result);
    if ($row['user'] == $user && $row['password'] == $password){
        header('Location: index.php'); 
    }
    else
        echo "Login failed !";
?>