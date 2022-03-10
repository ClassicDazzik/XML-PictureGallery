<!DOCTYPE html>
<html lang="en">
<html>
<head>
<?php
$dom = new DOMDocument ('1.0');
$xml = simplexml_load_file('data.xml');
foreach($xml->img as $img){
    if($img['accepted'] == '0'){
        $img = $dom->createElement('img');
        $domAttributeSource = $dom->createAttribute('src');
        $domAttributeSource->value = $_GET
    }
}
?>  
<img src="img/4546B.png" alt="im trying ok" style="width:600px;height:400px"><br>
<input type="submit" value="Accept" name="yes">
<input type="submit" value="Delete" name="no">
</head>
</html>