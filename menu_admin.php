<p><font size="5" ;color="white">Welcome:</font></p> 
<?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?> 
| <a href="index.php">Home</a>
| <a href="memberlist.php">Memberlist</a>
| <a href="edit_account.php">Edit Account</a>
| <a href="logout.php">Logout</a>