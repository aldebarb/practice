<?php 
include('core/inc/guestbook.inc.php');

if (isset($_POST['message']) && !empty($_POST['message'])) {
    $message = removeEntities($_POST['message'], $mysqli);
    add_post($message, $mysqli);
}
$posts = fetch_posts($mysqli);
?>
<!DOCTYPE html>
<html>
<head>
	<title>XSS - Cross Site Scripting</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
</head>
<body>
    <div>
        <hr />
        <?php 
        foreach ($posts as $message) {
            echo $message;
            echo "<hr />";
        }
        ?>
    </div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <p>
            <label>Blog Post</label>
            <textarea name="message" rows="4" cols="50" maxlength="250"></textarea>
        </p>
        <p>
            <input type="submit" name="submit" value="Post">
        </p>
    </form>
</body>
</html>