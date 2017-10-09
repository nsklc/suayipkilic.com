<!DOCTYPE html>
 <html>
 <title></title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body class="w3-white">

  <div class="w3-container w3-padding-large w3-light-grey w3-margin-bottom">
      <hr class="w3-opacity">
      <form method="post" action="NWC.php">
        <div class="w3-row">
            <div class="w3-col s1 w3-green w3-center">
              <label for="Supply">Supplier Number</label>
              <input class="w3-input w3-border" type="text" name="Supply" id="Supply" required>
            </div>

            <div class="w3-col s1 w3-green w3-center">
              <label for="Demand">Demander Number</label>
              <input class="w3-input w3-border" type="text" name="Demand" id="Demand" required>
            </div>
        </div>
        <button type="submit" class="w3-button w3-black w3-margin-bottom">OK</button>
      </form>
    </div>

<!-- Create input form table -->
  <?php

  function getInput($supply,$demand,$what){
    $x=0;$output="";
    for ($i=0; $i < $supply ; $i++) {
      $output .= '<div class="w3-row">';
      for ($j=0; $j < $demand; $j++) {
        $output .='<div class="w3-col s1 w3-green w3-center">
        <input class="w3-input w3-border" type="text" name="'.$what.$x.'" id="'.$what.$x.'" value="0" required>
          </div>';
        $x++;
      }
      $output.='</div>';
    }
    return $output;
  }
?>

<div class="w3-container w3-padding-large w3-light-grey w3-margin-bottom">
    <hr class="w3-opacity">
    <form method="post" action="Result.php">
      <?php
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        $supply = trim(filter_input(INPUT_POST,"Supply",FILTER_SANITIZE_NUMBER_INT));//trim is removes white space from the beginning and end of a piece of text
        $demand = trim(filter_input(INPUT_POST,"Demand",FILTER_SANITIZE_NUMBER_INT));
      }
      echo getInput($supply,$demand,"table");
      echo "Demands = ".getInput(1,$demand,"demand");
      echo "Supplies = ".getInput($supply,1,"supply");
      ?>
      <button type="submit" class="w3-button w3-black w3-margin-bottom">OK</button>
    </form>
  </div>

<!-- Create input form table -->
