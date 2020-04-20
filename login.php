<?php
 //starting of the session
require("connection.php");

$submitted_username = '';

// This if statement checks to determine whether the login form has been submitted
// If it has, then the login code is run, otherwise the form is displayed
if (!empty($_POST)) {
	

    if ($_POST["verficationcode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')
    {
    echo "<script>alert('Incorrect captcha');</script>" ;
    }
    else{
    // This query retreives the user's information from the database using
    // their username.
    $query = "
        SELECT
            id,
            username,
            password,
            salt,
            email
        FROM users
        WHERE
            username = :username
    ";

    // The parameter values
    $query_params = array(
        ':username' => $_POST['username']
    );

    try { 
        // Execute the query against the database
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex) { 
       
        //$ex->getMessage() may provide an attacker with helpful information about your code.
        die("Failed to run query: " . $ex->getMessage());
    }

    
    $login_ok = false;

    // Retrieve the user data from the database.  If $row is false, then the username
    // they entered is not registered.
    $row = $stmt->fetch();
    if ($row) { 
        // Using the password submitted by the user and the salt stored in the database,
        // we now check to see whether the passwords match by hashing the submitted password
        // and comparing it to the hashed version already stored in the database.
        $check_password = hash('sha256', $_POST['password'] . $row['salt']);
        for ($round = 0; $round < 65536; $round++) {
            $check_password = hash('sha256', $check_password . $row['salt']);
        }
        if ($check_password === $row['password']) { 
            // If they do, then we flip this to true
            $login_ok = true;
        }
    }

    // If the user logged in successfully, then we send them to the private members-only page
    // Otherwise, we display a login failed message and show the login form again
    if ($login_ok) { 
        // Here I am preparing to store the $row array into the $_SESSION by
        // removing the salt and password values from it.  Although $_SESSION is
        // stored on the server-side, there is no reason to store sensitive values
        // in it unless you have to.  Thus, it is best practice to remove these
        // sensitive values first.
        unset($row['salt']);
        unset($row['password']);

        // This stores the user's data into the session at the index 'user'.
        // We will check this index on the private members-only page to determine whether
        // or not the user is logged in.  We can also use it to retrieve
        // the user's details.
        $_SESSION['user'] = $row;

        // Redirect the user to the private members-only page.
        header("Location: index.php");
        die("Redirecting to: index.php");
    }
    else {
        // Tell the user they failed
       
		echo "<font color=\"white\">Username or Password is incorrect !</font>";

        //prevention against xss attacks by using htmlentities
        $submitted_username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');
 
	} }
}

?>
<!doctype html>
<html lang="en">
    <head>
        <title>Kid's Corner Login</title>
        <meta charset="UTF-8">
    </head>

<link rel="stylesheet" type="text/css" href="style.css">

<body style="background: url(https://cdn2.vectorstock.com/i/1000x1000/32/11/abstract-3d-grey-background-made-from-triangles-vector-2853211.jpg); background-size: 100%" >

<img align="right" width="450" height="250" src="https://s3.amazonaws.com/kids-corner/assets/images/hero/KidsCorner-cover-art.jpg"  >

<?php include("menu.php"); ?>

<h2 style="text-align:left;">
<p>
<font size="5" face="arial" color="black" >
<br><br>
<br>
Bored of taking out kids, you have landed at the <br>right place for 
your kids, to develop knowledge  <br>with a whole lot of fun!
</font>
</h2>

<h5 style="text-align:left;">
<font size="6" face="arial" color="white" >
<br>
<br>
<br>
Welcome to <u>Kid's Corner:</u>
</font>
</h5>

<h3 style="text-align:right">
<font size="5" face="arial" color="white" >

"Lets make your kids learning 
<br>
fun with joy and interesting videos "
</font>
</p>
</h3>


<h4 style="text-align:left">
<font size="5" face="arial" color="black" >
To unlock more, login to the academy and enjoy <br>the videos! 
If u haven't registered yet hop into <br>the academy by filling out few details!   
</font>
</h4>


<div class="loginbox">
<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSf_crtZCbKAUy_SdhLdRCEN5S6RC5-S24EX-V-a9tMyJGtHBMA&usqp=CAU"; class="avatar">

<h1>
<p>
<font size="6" face="arial" color="black" >
Enter your Credentials:
</font>
</p>
</h1>



<form action="login.php" method="post" style= "color:white;">
    Username:
    <br />
    <input type="text" name="username" value="<?php echo $submitted_username; ?>" />
    <br />
    <br />
    Password:
    <br />
    <input type="password" name="password" value="" />
    <br />
    <br />
	<div class="form-group">
              Captcha:
			  <br>
			  <input type="text"   name="verficationcode" maxlength="5" autocomplete="off" required  style="width: 200px;"  placeholder="Enter Captcha" autofocus />&nbsp;
              <!--Cpatcha Image -->
              <img src="captcha.php">
              </div>
			  <br><br>
    <input type="submit" value="Login" />
	
   
</form>
</body>
</html>