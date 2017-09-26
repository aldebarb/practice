<?php 
include('/../init.inc.php');
function removeEntities($message, $mysqli)
{
	$message = htmlentities($message, ENT_COMPAT, 'UTF-8');
	$message = $mysqli->real_escape_string($message);
	return $message;
}
// adds a new post to the guestbook.
function add_post($message, $mysqli) 
{
	$mysqli->query("INSERT INTO post (post_body) VALUES ('$message')");
}
//fetches all posts from the database
function fetch_posts($mysqli)
{
	$result = $mysqli->query("SELECT post_body FROM post");
	$posts = array();
	while ($row = $result->fetch_assoc()) {
		$posts[] = $row['post_body'];
	}
	return $posts;
}