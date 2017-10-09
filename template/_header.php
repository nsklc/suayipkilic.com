<?php
  session_start();
  require_once('language/Words.php');
  $i=0;
  $ext='?language=En';
  if($_SESSION["language"] == De){
    $i=1;
    $ext='?language=De';
  }
  else if($_SESSION["language"] == Tr){
    $i=2;
    $ext='?language=Tr';
  }
?>
<!DOCTYPE html>
 <html>
 <title>Şuayip Kılıç</title>";

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body class="w3-white">

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card-2">
    <a href="index.php" class="w3-bar-item w3-button"><b>ŞUAYİP KILIÇ</b></a>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="index.php#projects" class="w3-bar-item w3-button"><?php echo $language['Projects'][$i]; ?></a>
      <a href="index.php#work" class="w3-bar-item w3-button"><?php echo $language['Work Experience'][$i]; ?></a>
      <a href="index.php#about" class="w3-bar-item w3-button"><?php echo $language['About'][$i]; ?></a>
      <a href="Contact.php" class="w3-bar-item w3-button"><?php echo $language['Contact'][$i]; ?></a>
    </div>
  </div>
</div>
