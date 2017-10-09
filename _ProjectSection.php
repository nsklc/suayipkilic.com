<?php
    include("inc/data.php");
?>
<div class="w3-container w3-card-2 w3-light-grey w3-margin-bottom">
<!-- Project Section -->
  <div class="w3-container w3-padding-32" id="projects">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16"><?php echo $language['Projects'][$i]; ?></h3>
  </div>

  <div class="w3-row-padding ">
    <?php
       echo getProject($catalog,'cesme');
       echo getProject($catalog,'samsung');
       echo getProject($catalog,'yukselis',2);
       echo getProject($catalog,'metz');
    ?>
  </div>

  <div class="w3-row-padding">
    <?php
      if (!$isIndex) {
         echo getProject($catalog,'aydemir');
        // echo getProject($catalog,'samsung');
        // echo getProject($catalog,'yukselis',2);
        // echo getProject($catalog,'aydemir');
      }
    ?>
  </div>
