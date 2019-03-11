<?php
	session_start();
    $db = mysqli_connect('localhost', 'root', 'pass1234', 'food');
    
    // initialize variables
	$Author = "";
    $Name = "";
    $Type = "";
    $Recipe = "";

    $update = false;
    
    if (isset($_POST['add']))
    {
		$Author = $_POST['Author'];
        $Name = $_POST['Name'];
        $Type = $_POST['Type'];
        $Recipe = $_POST['Recipe'];
		mysqli_query($db, "INSERT INTO recipes (Author, Name, Type, Recipe) VALUES ('$Author', '$Name', '$Type', '$Recipe')"); 
		$_SESSION['message'] = "Recipe added"; 
		header('location: index.php');
    }

    if (isset($_POST['update']))
     {
        $Id = $_POST['Id'];
        $Author = $_POST['Author'];
        $Name = $_POST['Name'];
        $Type = $_POST['Type'];
        $Recipe = $_POST['Recipe'];
        mysqli_query($db, "UPDATE recipes SET Author='$Author', Name='$Name', Type='$Type', Recipe='$Recipe' WHERE Id=$Id");
        $_SESSION['message'] = "Recipe updated!"; 
        header('location: index.php');
    }

    if (isset($_GET['delete'])) 
    {
        $id = $_GET['delete'];
        mysqli_query($db, "DELETE FROM recipes WHERE Id=$id");
        $_SESSION['message'] = "Recipe deleted!"; 
        header('location: index.php');
    }
?>