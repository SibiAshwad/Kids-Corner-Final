<?php 
//start the session
require("connection.php");

//checking whether logged in or not
if (empty($_SESSION['user'])) {
    
    header("Location: login.php");

    die("Redirecting to login.php");
}

if (!empty($_POST)) {
    // checking of valid user email is given
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        die("Invalid E-Mail Address");
    }
    
    if ($_POST['email'] != $_SESSION['user']['email']) {
        // Defining  SQL query
        $query = "
            SELECT
                1
            FROM users
            WHERE
                email = :email
        ";

        // Defining query parameter values
        $query_params = array(
            ':email' => $_POST['email']
        );

        try { 
            // Execution of the query
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }
        catch(PDOException $ex) 
		{// $ex->getMessage() may provide an attacker with helpful information about your code.
            die("Failed to run query: " . $ex->getMessage());
        }

        // Retrieve results (if any)
        $row = $stmt->fetch();
        if ($row) {
            die("This E-Mail address is already in use");
        }
    }

   //hashing and salting of passwords 
    if (!empty($_POST['password'])) {
        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
        $password = hash('sha256', $_POST['password'] . $salt);
        for ($round = 0; $round < 65536; $round++) {
            $password = hash('sha256', $password . $salt);
        }
    }
    else {
        
        $password = null;
        $salt = null;
    }

    // Initial query parameter values
    $query_params = array(
        ':email' => $_POST['email'],
        ':user_id' => $_SESSION['user']['id'],
    );

   
    if ($password !== null) {
        $query_params[':password'] = $password;
        $query_params[':salt'] = $salt;
    }

    
    $query = "
        UPDATE users
        SET
            email = :email
    ";

    
    if ($password !== null) {
        $query .= "
            , password = :password
            , salt = :salt
        ";
    }

    // Finally we finish the update query by specifying that we only wish
    // to update the one record with for the current user.
    $query .= "
        WHERE
            id = :user_id
    ";

    try {
        // Execute the query
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex) {
        // Note: On a production website, you should not output $ex->getMessage().
        // It may provide an attacker with helpful information about your code.
        die("Failed to run query: " . $ex->getMessage());
    }

    // Now that the user's E-Mail address has changed, the data stored in the $_SESSION
    // array is stale; we need to update it so that it is accurate.
    $_SESSION['user']['email'] = $_POST['email'];

    // This redirects the user back to the members-only page after they register
    header("Location: index.php");

    
    die("Redirecting to index.php");
}
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Edit account</title>
        <meta charset="UTF-8">
    </head>

<link rel="stylesheet" type="text/css" href="style.css">

<body style="background: url(https://cdn2.vectorstock.com/i/1000x1000/32/11/abstract-3d-grey-background-made-from-triangles-vector-2853211.jpg); background-size: 100%">

<?php include("menu_admin.php"); ?>

<img align="right" width="450" height="250" src="https://s3.amazonaws.com/kids-corner/assets/images/hero/KidsCorner-cover-art.jpg"  >
<div class="editbox">
<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSf_crtZCbKAUy_SdhLdRCEN5S6RC5-S24EX-V-a9tMyJGtHBMA&usqp=CAU"; class="avatar">

<h1>Edit Account</h1>
<form action="edit_account.php" method="post">
    Username:
    <br />
    <?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?>
    <br />
    <br />
    E-Mail Address:
    <br />
    <input type="text" name="email" value="<?php echo htmlentities($_SESSION['user']['email'], ENT_QUOTES, 'UTF-8'); ?>" />
    <br />
    <br />
    Password:
    <br />
    <input type="password" name="password" value="" /><br />
    <i>(leave blank if you do not want to change your password)</i>
    <br /><br />
    <input type="submit" value="Update" />
    
</form>
</body>
</html>