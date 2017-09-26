<?php
if (isset($_FILES['upload'])) {
	$allowedExtension = array('jpg', 'jpeg', 'png', 'gif');
	$extension = strtolower(substr($_FILES['upload']['name'], strrpos($_FILES['upload']['name'], '.') + 1));
    $errors = array();
	//echo $extension;
    if (in_array($extension, $allowedExtension) === false) {
        $errors[] = "You can only upload images.";
    }
    if ($_FILES['upload']['size'] > 1000000) {
        $errors[] = "The file was too big.";
    }
    if (empty($errors)) {
	move_uploaded_file($_FILES['upload']['tmp_name'], "files/{$_FILES['upload']['name']}");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Upload Files</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
    <div>
    	<?php
    	if (isset($errors)) {
            if (empty($errors)) {
    		echo '<a href="files/' . $_FILES['upload']['name'] . '">View Image</a>';
            } else {
                foreach ($errors as $error) {
                    echo "$error<br>";
                }
            }
    	}
    	?>
    </div>
    <div>
        <form action="" method="post" enctype="multipart/form-data">
        	<p>
        		<input type="file" name="upload"/>
        		<input type="submit" value="Upload"/>
        	</p>
        </form>
    </div>
</body>
</html>