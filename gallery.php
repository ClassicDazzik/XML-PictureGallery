<?php 
$xml = simplexml_load_file('data.xml');
?>

<html>
<head>
<style>
div.gallery {
  margin: 5px;
  border: 1px solid #ccc;
  float: left;
  width: 360px;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}
</style>
</head>
<body>
<?php
foreach ($xml->img as $img): ?>

<?php if ($img['accepted'] == '1'):?>
<div class="gallery">
    <img src="<?php echo $img->name ?>" alt="couldnt load the image" width="600" height="400">
    <div class="name">Uploaded by <?php echo $img->sendername ?></div><br>
    <div class="date">Added on <?php echo $img->date ?></div>
</div>
<?php endif; ?>
<?php endforeach; ?>
</body>
</html>
