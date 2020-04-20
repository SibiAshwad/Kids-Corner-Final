<?php
// starting the session
require("connection.php");
 
// This if statement checks to determine whether the registration form has been submitted 
// If it has, then the registration code is run, otherwise the form is displayed
 
if (!empty($_POST)) 
{
	
    // Ensuring of non-empty username field aren't left out
    if (empty($_POST['username'])) {
        
        die("Please enter a username.");
    }

    // Ensure that the user has entered a non-empty password
    if (empty($_POST['password'])) 
	{     
             die("Please enter a password.");
        
		
					
    }
	else{
		$password = $_POST['password'];
		
		if(!preg_match("/^(?=.{10,})(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+]).*$/",$password))
                   {
                      echo "<script>alert('Password must contain minimum one of the following Capital letter, number, special character and must be more than 10 characters');</script>";
					  die("");
					  header('location:register.php');
                    }
        
	}
		
	
    // Make sure the user entered a valid E-Mail address
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        die("Invalid E-Mail Address");
    }

    // We will use this SQL query to see whether the username entered by the
    // user is already in use. 
    // :username is a special token, we will substitute a real value in its place when
  
    $query = "
        SELECT
            1
        FROM users
        WHERE
            username = :username
    ";

    // This contains the definitions for any special tokens that we place in
    // our SQL query.  In this case, we are defining a value for the token
    // :username.  It is possible to insert $_POST['username'] directly into
    // your $query string; however doing so is very insecure and opens your
    // code up to SQL injection exploits.  Using tokens prevents this.
    $query_params = array(
        ':username' => $_POST['username']
    );

    try {
        
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex) {
        // Note: On a production website, you should not output $ex->getMessage().
        // $ex->getMessage() may provide an attacker with helpful information about your code.
        die("Failed to run query: " . $ex->getMessage());
    }

    
    $row = $stmt->fetch();

   
    if ($row) {
        die("This username is already in use");
    }

    
    $query = "
        SELECT
            1
        FROM users
        WHERE
            email = :email
    ";

    $query_params = array(
        ':email' => $_POST['email']
    );

    try { 
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex) {
        die("Failed to run query: " . $ex->getMessage());
    }

    $row = $stmt->fetch();

    if($row) {
        die("This email address is already registered");
    }

    
    // protection against SQL injection attacks.
    $query = "
        INSERT INTO users (
            username,
            password,
            salt,
            email
        ) VALUES (
            :username,
            :password,
            :salt,
            :email
        )
    ";

    // Generation of hex 8 byte salt for protection agains bruteforce and rainbow table attacks 
   
    $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));

    
    $password = hash('sha256', $_POST['password'] . $salt);

    // Next we hash the hash value 65536 more times.  The purpose of this is to
    // protect against brute force attacks.  Now an attacker must compute the hash 65537
    // times for each guess they make against a password, whereas if the password
    // were hashed only once the attacker would have been able to make 65537 different
    // guesses in the same amount of time instead of only one.
    for($round = 0; $round < 65536; $round++) { 
        $password = hash('sha256', $password . $salt);
    }

    // Here we prepare our tokens for insertion into the SQL query.  We do not
    // store the original password; only the hashed version of it.  We do store
    // the salt (in its plaintext form; this is not a security risk).
    $query_params = array(
        ':username' => $_POST['username'],
        ':password' => $password,
        ':salt' => $salt,
        ':email' => $_POST['email']
    );

    try { 
        // Execute the query to create the user
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex) {
        
        // $ex->getMessage() may provide an attacker with helpful information about your code.
        die("Failed to run query: " . $ex->getMessage());
    }

    
    echo "
        <script type='text/javascript'>
        alert('Account created!');
        window.location.href='login.php';
        </script>";

  
    die("Redirecting to login.php");
}
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
    </head>
<link rel="stylesheet" type="text/css" href="style.css">

<body style="background: url(https://cdn2.vectorstock.com/i/1000x1000/32/11/abstract-3d-grey-background-made-from-triangles-vector-2853211.jpg); 
background-size: 100%">

<?php include("menu.php"); ?>
<h1 style="text-align:left;">Just one more step ahead------------------> </h1>
<h2 style="text-align:left;">
<font size="6" color="white">Fill in the details to scrutinize your <br>childrens knowledge in much more <br> interesting way.</font></h2>
<br><br>
<h3><font size="6" face="arial" color="black">Password must contain <br>(Security Measure):<br>
1.An upper case letter.<br>
2.A lower case letter.<br>
3.A number<br>
4.Special character<br>
5.It should atleast consists of 10 character.</font></h3>

<div class="reglog">
<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSf_crtZCbKAUy_SdhLdRCEN5S6RC5-S24EX-V-a9tMyJGtHBMA&usqp=CAU"; class="avatar">

<h2>Register</h2>




<form action="register.php" method="post">
    Username:
    <br />
    <input type="text" name="username" value="" required />
    <br />
    <br />
    E-Mail:
    <br />
    <input type="text" name="email" value="" required />
    <br />
    <br />
    Password:
    <br />
    <input type="password" name="password" value="" required />
    <br />
	<br />
    <input type="submit" value="SignUp" />
   
</form>
</body>
</html>
