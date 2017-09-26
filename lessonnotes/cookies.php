<?php 
$mysqli = new mysqli('localhost', 'root', 'password', 'first_db');

if (isset($_POST['username'], $_POST['password']) || isset($_COOKIE['username'], $_COOKIE['password'])) {

    if (isset($_COOKIE['username'], $_COOKIE['password'])) {
        $username = $mysqli->real_escape_string($_COOKIE['username']);
        $password = $mysqli->real_escape_string($_COOKIE['password']);
    } else {
	$username = $mysqli->real_escape_string($_POST['username']);
	//Normally Hash this.
	$password = $mysqli->real_escape_string($_POST['password']);
    }
    
    $users = $mysqli->query("SELECT COUNT(id) FROM users WHERE username = '$username' AND password = '$password'");
	/* 
	    Check query syntax 
	    if(!$users) {
	        throw new Exception('Invalid query: ' . $mysqli->error);
	    }
	*/
	$count = $users->fetch_array();
	if ($count[0] == 1) {
        // setcookie('Name', 'Value', Timestamp to expire)
	    setcookie('username', $username, Time() + 600);//600 seconds
	    //normally hash this password//
	    setcookie('password', $password, Time() + 600);
        $_SESSION['logged_in'] = 1;
        var_dump($_SESSION);
	}
}

if (isset($_POST['logout'])) {
    //setcookie('Name') - Removes the value from the cookies
    setcookie('username');
    setcookie('password');
    session_destroy();
    var_dump($_SESSION);
    //Refresh
    header("location:" . $_SERVER['PHP_SELF']);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cookies</title>
	<meta http_equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
    <p>
    	<?php 
    	if (isset($_SESSION['logged_in'])) {
    		echo "You are logged in!";
    	}
    	?>
    </p>
    <form action="" method="post">
    <p>
    	<label for="user">Username:</label>
    	<input type="text" name="username" id="username"/>
    </p>
    <p>
    	<label for="password">Password:</label>
    	<input type="text" name="password" id="password">
    </p>
    <p>
    	<input type="submit" value="Login">
        <input type="submit" name="logout" value="Logout">
    </p>
    	
    </form>
</body>
</html>