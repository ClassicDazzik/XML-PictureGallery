
<!DOCTYPE html>
<html lang="en">
<html>
<head>
</head>
<body>

<?php
$xml = simplexml_load_file('data.xml');
$imgIndex = intval($_GET['id']);

if (isset($_GET['delete']) && isset($_GET['id'])){
    unlink($xml->img->name[$imgIndex]);
    unset($xml->img[$imgIndex]);
}
if (isset($_GET['accept']) && isset($_GET['id'])){
    $xml->img[$imgIndex]['accepted'] = '1';
}
if (isset($_GET['cancel']) && isset($_GET['id'])){
    $imgIndex = intval($_GET['id']);
    $xml->img[$imgIndex]['accepted'] = '0';
}

$dom = new DOMDocument("1.0");
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
$dom->loadXML($xml->asXML());
$dom->save('data.xml');
?>

<?php 
    $i = 0;
    foreach ($xml->img as $img): ?>

    <img src="<?php echo $img->name ?>" alt="<?php echo $img->sendername; ?>" style="width:600px;height:400px"><br>
   
    <?php if ($img['accepted'] == '0'):?>
        <form action="" method="">
            <input type="text" value="<?php echo $i; ?>" name="id">
            <input type="submit" value="Accept" name="accept">
            <input type="submit" value="Delete" name="delete">
        </form>
    <?php else: ?>
        <form action="" method="">
            <input type="text" value="<?php echo $i; ?>" name="id">
            <input type="submit" value="Cancel Accept" name="cancel">
            <input type="submit" value="Delete" name="delete">
        </form>
    <?php endif; ?>

    <?php $i++;?>

<?php endforeach; ?>

</body>
</html>