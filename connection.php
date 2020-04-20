<?php
// defining the connection information for  MySQL database
$username = "root";
$password = "";
$host = "127.0.0.1";
$dbname = "7";

// UTF-8 is a character encoding scheme that allows you to conveniently store wide rang of special characters
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

// A try/catch statement is a common method of error handling in object oriented code.
// First, PHP executes the code within the try block.  If at any time it encounters an
// error while executing that code, it stops immediately and jumps down to the
// catch block.  
try {
    // This statement opens a connection to your database using the PDO library
    // PDO is designed to provide a flexible interface between PHP and many
    // different types of database servers. 
    $db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options);
}
catch (PDOException $ex) {
    // If an error occurs while opening a connection to your database, it will
    // be trapped here.  The script will output an error and stop executing.
    // Note: On a production website, you should not output $ex->getMessage().
    // It may provide an attacker with helpful information about your code
    // (like your database username and password).
    die("Failed to connect to the database: " . $ex->getMessage());
}

// This statement configures PDO to throw an exception when it encounters
// an error.  This allows us to use try/catch blocks to trap database errors.
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// This statement configures PDO to return database rows from your database using an associative
// array.  This means the array will have string indexes, where the string value
// represents the name of the column in your database.
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// This block of code is used to undo magic quotes.  Magic quotes are a very dangerous
// feature that was removed from PHP as of PHP 5.4.  
if (function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()) {
    function undo_magic_quotes_gpc(&$array) {
        foreach($array as &$value) {
            if (is_array($value)) {
                undo_magic_quotes_gpc($value);
            }
            else {
                $value = stripslashes($value);
            }
        }
    }
    undo_magic_quotes_gpc($_POST);
    undo_magic_quotes_gpc($_GET);
    undo_magic_quotes_gpc($_COOKIE);
}

header('Content-Type: text/html; charset=utf-8');

// Initializing of a  a session.  

session_start();

?>