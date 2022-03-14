
<!DOCTYPE html>
<html lang="en">
<html>
<head>
</head>
<body>

<?php
$xml = simplexml_load_file('data.xml');
$i = 0;

if (isset($_GET['delete']) && isset($_GET['id'])){
    echo `<p>Poistetaan kuva {$_GET['id']}</p>`;
    unlink();
    unset($xml->img[$i]);
}

$dom = new DOMDocument("1.0");
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
$dom->loadXML($xml->asXML());
$dom->save('data.xml');
?>

<?php foreach ($xml->img as $img): ?>
   
    <img src="<?php echo $img->name ?>" alt="<?php echo $img->sendername; ?>" style="width:600px;height:400px"><br>
   
    <?php if ($img['accepted'] == '0'): ?>
        <form action="" method="">
            <input type="text" value="<?php echo $i++; ?>" name="id">
            <input type="submit" value="Accept" name="accept">
            <input type="submit" value="Delete" name="delete">
        </form>
    <?php endif; ?>
    
<?php endforeach; ?>

</body>
</html>