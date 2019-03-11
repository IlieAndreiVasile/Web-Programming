<?php include('crud.php'); ?>
<?php 
    if (isset($_GET['edit'])) 
    {
		$Id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM recipes WHERE Id=$Id");
        if (!is_null($record) )
        {
			$n = mysqli_fetch_array($record);
			$Author = $n['Author'];
            $Name = $n['Name'];
            $Type = $n['Type'];
            $Recipe = $n['Recipe'];
		}
	}
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Food recipes</title>
    </head>
    <body>
        <?php $results = mysqli_query($db, "SELECT * FROM recipes"); ?>
        <?php if (isset($_SESSION['message'])): ?>
            <div class="msg">
                <?php 
                    echo $_SESSION['message']; 
                    unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>

        <table>
                <tr>
                    <th>Author</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Recipe</th>
                    <th></th>
                </tr>
            
            <?php while ($row = mysqli_fetch_array($results)) { ?>
                <tr>
                    <td><?php echo $row['Author']; ?></td>
                    <td><?php echo $row['Name']; ?></td>
                    <td><?php echo $row['Type']; ?></td>
                    <td><?php echo $row['Recipe']; ?></td>
                    <td>
                        <a href="index.php?edit=<?php echo $row['Id']; ?>" class="editButton">Edit</a>
                        <p>---</p>
                        <a href="crud.php?delete=<?php echo $row['Id']; ?>" class="deleteButton">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        
        <form method="post" action="crud.php" >
            <div class="input-group">
                <input type="hidden" name="Id" value="<?php echo $Id; ?>">
            </div>
            <div class="input-group">
                <label>Author</label>
                <input type="text" name="Author" value="<?php echo $Author; ?>">
            </div>
            <div class="input-group">
                <label>Name</label>
                <input type="text" name="Name" value="<?php echo $Name; ?>">
            </div>
            <div class="input-group">
                <label>Type</label>
                <input type="text" name="Type" value="<?php echo $Type; ?>">
            </div>
            <div class="input-group">
                <label>Recipe</label>
                <input type="text" name="Recipe" value="<?php echo $Recipe; ?>">
            </div>
            <div class="input-group">
                <?php if ($update == true): ?>
                    <button class="editButton" type="submit" name="update">Update</button>
                <?php else: ?>
                    <button class="addButton" type="submit" name="add">Add</button>
                <?php endif ?>
            </div>
        </form>

    </body>
</html>