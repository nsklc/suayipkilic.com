<?php
  function get_item_html($id,$item) {
      $output = "<li><a href='#'><img src='"
          . $item["img"] . "' alt='"
          . $item["title"] . "' />"
          . "<p>View Details</p>"
          . "</a></li>";
      return $output;
  }

  function array_category($catalog,$category){
    if ($category == null) {
        return array_keys($catalog);
    }

    $output = array();

    foreach ($catalog as $id => $item) {
        if (strtolower($category) == strtolower($item["category"])) {
          $output[] = $id;
        }
    }

    return $output;
  }

  function get_button($buttonName,$ext,$url){
    $output = '<div class="w3-row-padding w3-margin-bottom">
     <div class="w3-col m8 s12"><a href="'.$url.'"><p>
     <button class="w3-button w3-padding-large w3-black w3-left w3-border"><b>'
     .$buttonName.' »</b></button></p></a>
     </div></div> </div>';
     return $output;
  }

  function getProject($array,$key,$imageNum = 0){
      $output = '<div class="w3-col l3 m6 w3-margin-bottom">
        <div class="w3-display-container">
          <a href="Project.php?cat='.$key.'">
            <div class="w3-display-topleft w3-black w3-padding">'.$array[$key]['title'].
            '</div>
            <img src="'.$array[$key]["images"][$imageNum].'" alt="House" style="width:100%">
          </a>
        </div>
      </div>';
      return $output;
  }

  // function getWork($title,$firm,$dateStart,$dateEnd,$definition){
  //   $output = '<div class="w3-container">
  //     <h5 class="w3-opacity"><b>'.$title.'   '.$firm.'</b></h5>
  //       <h6 class="w3-text-teal"> <img src="img/calender.png"> '
  //       .$dateStart.' - '.$dateEnd.'</h6><p>'.$definition.
  //       '</p>
  //       <hr>
  //     </div>';
  //   return $output;
  // }
  function getWork($date,$title,$firm,$url,$urlShort){
    $output = '<div class="w3-container">'.
      '<h5 class="w3-opacity"><b>'.'<img src="img/calender.png"> '.$title.' - '.$firm.' - '
      .'<a href="'.$url.'" target="_blank">'.$urlShort.'</a>'.'</b></h5>';
     $output.='</div><hr>';
    return $output;
  }

?>
