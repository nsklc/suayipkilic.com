<?php

  include("inc/data.php");
  include("inc/functions.php");

  $isIndex = false;

  $pageTitle = "Projelerimiz";
  $section = null;

  if (isset($_GET["cat"])) {
      if ($_GET["cat"] == "cesme") {
          $pageTitle = "Çeşme Plus Hotel";
          $section = "cesme";
      } else if ($_GET["cat"] == "samsung") {
          $pageTitle = "Samsung Showroom";
          $section = "samsung";
      } else if ($_GET["cat"] == "yukselis") {
          $pageTitle = "Yükseliş İnşaat";
          $section = "yukselis";
      } else if ($_GET["cat"] == "aydemir") {
          $pageTitle = "Aydemir İnşaat";
          $section = "aydemir";
      } else if ($_GET["cat"] == "metz") {
          $pageTitle = "Metz Otel";
          $section = "metz";
      } else{
          $section = NULL;
      }
  }

  require_once("template/_header.php");

    if ($section != null) {
      echo '<div class="w3-container w3-padding-32" id="projects">
        <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">';
              echo $pageTitle;
      echo  ' </h3>
      </div>';
    }

  echo '<div class="w3-row-padding">';

    if ($section != null) {
      for ($i=0; $i < $catalog[$section]["imageCount"]; $i++) {
        echo '<div class="w3-col l3 m6 w3-margin-bottom">
          <div class="w3-display-container">';
          echo '<img src="'.$catalog[$section]["images"][$i].'" onclick="onClick(this)" alt="Şuayip Kılıç" style="width:100%">';
        echo '  </div>
        </div>';
      }
    } else {
      include("template/_ProjectSection.php");
      //echo '<div id="googleMap" class="w3-grayscale" style="width:100%;height:250px;"></div>';
    }

  echo '</div>';
  ?>

  <?php require_once('template/_footer.php');?>

  <div id="modal01" class="w3-modal w3-black" style="padding-top:0" onclick="this.style.display='none'">
    <span class="w3-button w3-black w3-xxlarge w3-display-topright">×</span>
      <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
        <img id="img01" class="w3-image">
        <p id="caption"></p>
      </div>
  </div>
  <script>
    function onClick(element) {
      document.getElementById("img01").src = element.src;
      document.getElementById("modal01").style.display = "block";
      var captionText = document.getElementById("caption");
      captionText.innerHTML = element.alt;
    }
  </script>
