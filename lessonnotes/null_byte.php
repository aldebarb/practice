<!DOCTYPE html>
<html>
<head>
	<title>Null Byte</title>
	<meta http-equiv="Content-Type" content="Text/html; charset=utf-8"/>
</head>
<body>
    <?php 
    
    //print_r($files);
    /*
        Null Byte removes the end of a string.
        Example
        ../security/null_byte.php?file=example%00
        %00 removes .txt and fails to load a file.
        Or can allow the user to add any file they choose.
    */
    $files = scandir('pages');
    unset($files[0], $files[1]);
    if (isset($_GET['file']) && in_array("{$_GET['file']}.txt", $files)) {
    	echo "<h3>Contents of pages/{$_GET['file']}.txt'</h3>";
    	include ("pages/{$_GET['file']}.txt");
    }
    ?> 

</body>
</html>