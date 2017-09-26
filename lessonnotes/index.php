<!DOCTYPE html>
<html>
<head>
	<title>Security</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
    <?php 
    print_r(scandir('pages'));
    $pages = scandir('pages');
    unset($pages[0], $pages[1]);
    if (isset($_GET['page']) && in_array($_GET['page'], $pages)) {
     	include ("pages/{$_GET['page']}");
    } else {
    	echo "404 Page Not Found!";
    }
    ?>
</body>
</html>