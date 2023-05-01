<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["file"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["file"]["tmp_name"]);
		if($check !== false) {
			$uploadOk = 1;
		} else {
			echo "A fájl nem kép.";
			$uploadOk = 0;
		}
		if (file_exists($target_file)) {
			echo "A fájl már létezik.";
			$uploadOk = 0;
		}
		if ($_FILES["file"]["size"] > 5000000) {
			echo "A fájl túl nagy.";
			$uploadOk = 0;
		}
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
			echo "A fájl nem megfelelő formátumú.";
        $uploadOk = 0;
        }
        if ($uploadOk == 0) {
        echo "A fájl feltöltése sikertelen.";
        } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "A fájl sikeresen feltöltve.";
        } else {
        echo "A fájl feltöltése sikertelen.";
        }
        }
}
} else {
header("Location: login.php");
}
?>
</body>
</html>