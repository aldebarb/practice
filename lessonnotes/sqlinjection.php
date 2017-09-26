<?php 
$mysqli = new mysqli('localhost', 'root', 'password', 'first_db');
if (isset($_POST['username'], $_POST['password'])) {
	$username = $mysqli->real_escape_string($_POST['username']);
	$password = $mysqli->real_escape_string($_POST['password']);
	echo "SELECT COUNT(id) FROM users WHERE username = '$username' AND password = '$password'";
    $query = $mysqli->query("SELECT COUNT(id) FROM users WHERE username = '$username' AND password = '$password'");

    $count = $query->fetch_array();
    
    /* The problem: 
        When a user types (username' -- ) this turns the rest of the SQL statement into a comment and allows them to gain access with only a username. 
        
        "SELECT COUNT(id) FROM users WHERE username = '$username' -- ' AND password = '$password'"
    */

    /* Recieving a number from user.
        Type cast as an (int), this will protect the number against any SQL Injections.
       
       if (isset($_POST['id'])) {
	       $id = (int)$_POST['id'];
       }
       $query = $mysqli->query("SELECT COUNT(id) FROM users WHERE id = $id");
    */
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>SQL Injection</title>
	<meta http-equiv="Content-Type" content="text/html;  charset=utf-8">
</head>
<body>
    <p>
        <?php 
        if (isset($count)) {
        	if ($count[0] ==  0) {
        		echo "Incorrect Password";
        	} else {
        		echo "Correct Password";
        	}

        }
        ?>
    <form action="" method="post">
        <p>
            <label for="username">Username:</label>
    	    <input type="text" name="username" id="email"/>
    	</p>
    	<p>
    	    <label for="password">Password:</label>
    	    <input type="password" name="password" id="password"/>
    	</p>
    	<p>
    	    <input type="submit" name="submit" value="Login"/>
        </p>
    </form>
</body>
</html>