<?php
$htmlpage = fopen("uploader.html", "r");

//$imgfile = $_POST['fileToUpload'];
$sendername = $_POST['sender'];

$imgFolder = "img/";
$imgFile = $imgFolder . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imgFileType = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "Uploading Image " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "This is not an image!";
        $uploadOk = 0;
    }
}
?>