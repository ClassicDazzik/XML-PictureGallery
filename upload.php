<?php

$xml = simplexml_load_file('gallery/data.xml');
$senderName = $_POST['sender'];
$imgDate = date('d-n-y')
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
if (file_exists($imgFile)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
if($imgFileType != "jpg" && $imgFileType != "png" && $imgFileType != "jpeg") {
    echo "Sorry, only JPG and PNG files are allowed.";
    $uploadOk = 0;
  }
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $imgFile)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }  
}

$xmlAdd = $xml->addChild('img');

if ($uploadOk == 1) {
  $xmlAdd->addChild('name', $imgFile);
  $xmlAdd->addChild('sendername', $senderName);
  $xmlAdd->addChild('date', $imgDate)
  $xmlAdd->addAttribute('accepted', '0')
}
?>