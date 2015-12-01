
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Photos Oscura</title>
</head>
<body>

<form action="index.php" method="POST" enctype="multipart/form-data">	
	File:
	<input type="file" name="image"> <input type="submit" value="Upload">
</form>	


<?php


// connect to database
mysql_connect("localhost","root","root") or die (mysql_error());
mysql_select_db("imageOscura") or die (mysql_error());

// file properties
$file = $_FILES['image']['tmp_name'];
	
	if(!isset($file))
	echo "Please select image";
	else
	{
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name = addslashes($_FILES['image']['name']);
	$image_size = getimagesize($_FILES['image']['tmp_name']);
	
	if($image_size==FALSE)
	echo "this is not image";
	else 
	 {
		if ($insert = mysql_query("INSERT INTO photos VALUES ('','$image_name','$image')"))
			$lastid = mysql_insert_id();
		 	echo "Image Uploaded <p/> Your image: <p/><img src=get.php?id=$lastid>";
		
	
	}

		}



?>

</body>
</html>


