<?php
  session_start();
  $language = strip_tags($_GET["language"]);
  if($language=="En" || $language=="De" || $language=="Tr") {
    $_SESSION["language"] = $language;
    header("Location:index.php");
  }
  // else
  //   header("Location:index.php");


?>
