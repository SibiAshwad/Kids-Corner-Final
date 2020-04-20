<?php

require("connection.php");
 

if(empty($_SESSION['user'])) {
   
    header("Location: login.php");

   
    die("Redirecting to login.php");
}


$query = "
    SELECT
        id,
        username,
        email
    FROM users
";

try {
    // These two statements run the query against your database table.
    $stmt = $db->prepare($query);
    $stmt->execute();
}
catch(PDOException $ex) {
    
    //  $ex->getMessage() may provide an attacker with helpful information about your code.
    die("Failed to run query: " . $ex->getMessage());
}
    
// Finally, we can retrieve all of the found rows into an array using fetchAll
$rows = $stmt->fetchAll();
?>
<?php include("menu_admin.php"); ?>



<!doctype html>
<html lang="en">
    <head>
        <title>Memberlist</title>
        <meta charset="UTF-8">
    </head>
<img align="right" width="450" height="250" src="https://s3.amazonaws.com/kids-corner/assets/images/hero/KidsCorner-cover-art.jpg"  >

<body style="background: url(https://cdn2.vectorstock.com/i/1000x1000/32/11/abstract-3d-grey-background-made-from-triangles-vector-2853211.jpg); background-size: 100%">
<h1>Memberlist</h1>
<table>
    <tr>
	<font size="4">
        <th>ID</th>
        <th>Username</th>
        <th>E-Mail Address</th>
    </font>
	</tr>
	<h2 Style="text-align:right;"><font size="6" color="white">To Know the members of this site :</font></h2>
	
    <?php foreach($rows as $row): ?>
        <tr>
            <td><?php echo $row['id']; ?></td> <!-- htmlentities is not needed here because $row['id'] is always an integer -->
            <td><?php echo htmlentities($row['username'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlentities($row['email'], ENT_QUOTES, 'UTF-8'); ?></td>
        </tr> 
    <?php endforeach; ?>
</table>
</body>
</html>