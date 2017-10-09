<?php

  function tablePrint($table,$supplyCount,$demandCount){
      for ($i=0; $i < $supplyCount; $i++) {
          for ($j=0; $j < $demandCount; $j++){
              echo $table[$i][$j][0]." ";
          }
          echo " ".$table[$i]["Supply"]."</br>";
      }
      for ($i=0;$i<$demandCount;$i++){
          echo $table["Demand"][$i]." ";
      }
      echo "</br>--------------------------</br>";
  }
  function costTablePrint($table,$supplyCount,$demandCount){
      for ($i=0; $i < $supplyCount; $i++) {
          for ($j=0; $j < $demandCount; $j++){
              echo $table[$i][$j]['Cost']." ";
          }
          echo "</br>";
      }
  }
  function calcTotalCost($table,$supplyCount,$demandCount){
      $totalCost="";
      for ($i=0; $i < $supplyCount; $i++) {
          for ($j=0; $j < $demandCount; $j++){
              $totalCost+=$table[$i][$j]['Cost']*$table[$i][$j][0];
          }
      }
      return $totalCost;
  }

  $table = [];
  $table["Demand"]=[];

  $temp = "demand";$demandCount=0;$temp=$temp.$demandCount;
  while(isset($_POST["$temp"])) {
    array_push($table["Demand"],$_POST[$temp]);
    $demandCount++;
    $temp = "demand";
    $temp=$temp.$demandCount;
  }
  $temp = "supply";$supplyCount=0;$temp=$temp.$supplyCount;
  while(isset($_POST["$temp"])) {
    $table[]=["Supply"=>$_POST[$temp]];
    $supplyCount++;
    $temp = "supply";
    $temp=$temp.$supplyCount;
  }
  $temp = "table";$x=0;$temp=$temp.$x;
  for ($i=0; $i < $supplyCount; $i++) {
    for ($j=0; $j < $demandCount; $j++) {
      array_push($table[$i],array('Cost' => $_POST[$temp], 0));
      $x++;
      $temp = "table";
      $temp=$temp.$x;
    }
  }

// Northwest Corner Method
  function nortwestCornerMedhod($table,$supplyCount,$demandCount,$stepPrint = false){
       $x=0;$y=0;
       if($stepPrint)
          tablePrint($table,$supplyCount,$demandCount);
       while ($x<$supplyCount AND $y<$demandCount) {
           if ($table[$x]["Supply"]<$table["Demand"][$y]) {
             $table[$x][$y][0]=$table[$x]["Supply"];
             $table["Demand"][$y]=$table["Demand"][$y]-$table[$x]["Supply"];
             $table[$x]["Supply"]=X;
             $x++;
           }else {
             $table[$x][$y][0]=$table["Demand"][$y];
             $table[$x]["Supply"]=$table[$x]["Supply"]-$table["Demand"][$y];
             $table["Demand"][$y]=X;
             $y++;
           }
           if($stepPrint)
              tablePrint($table,$supplyCount,$demandCount);
       }
       return $table;
  }
//  $table = nortwestCornerMedhod($table,$supplyCount,$demandCount,true);
//  echo "Total cost = ".calcTotalCost($table,$supplyCount,$demandCount);

// Minimum Cost Method
  function minumumCostMethod($table,$supplyCount,$demandCount,$stepPrint = false){
      tablePrint($table,$supplyCount,$demandCount);
      for ($a=0; $a < $supplyCount+$demandCount-1; $a++) {
            $min=100;$x=0;$y=0;
            for ($i=0; $i < $supplyCount; $i++) {
              for ($j=0; $j < $demandCount; $j++){
                if ($table[$i][$j]['Cost']<$min AND $table[$i]["Supply"]!=X AND $table["Demand"][$j]!=X) {
                  $min=$table[$i][$j]['Cost'];
                  $x=$i;$y=$j;
                }
              }
            }
            if ($table[$x]["Supply"]<$table["Demand"][$y]) {
              $table[$x][$y][0]=$table[$x]["Supply"];
              $table["Demand"][$y]=$table["Demand"][$y]-$table[$x]["Supply"];
              $table[$x]["Supply"]=X;
              $x++;
            }else {
              $table[$x][$y][0]=$table["Demand"][$y];
              $table[$x]["Supply"]=$table[$x]["Supply"]-$table["Demand"][$y];
              $table["Demand"][$y]=X;
              $y++;
            }
            if ($stepPrint)
                tablePrint($table,$supplyCount,$demandCount);
      }
      return $table;
  }
  $table = minumumCostMethod($table,$supplyCount,$demandCount,true);
  echo "Total cost = ".calcTotalCost($table,$supplyCount,$demandCount);

  // Minimum Cost Method
  //Vogel’s Method

//
//for($s=0;$s<15;$s++) {
//    $columnPenalty = [];
//    $rowPenalty = [];
//
//    $min = 1000;
//    $min1 = 1000;
//    for ($i = 0; $i < $supplyCount; $i++) {
//        $min = 100;
//        $min1 = 100;
//        for ($j = 0; $j < $demandCount; $j++) {
//            if ($table[$i][$j]['Cost'] < $min AND $table[$i]["Supply"] != X AND $table["Demand"][$j] != X) {
//                $min = $table[$i][$j]['Cost'];
//            }
//        }
//        for ($j = 0; $j < $demandCount; $j++) {
//            if ($table[$i][$j]['Cost'] < $min1 AND $table[$i][$j]['Cost'] != $min
//                AND $table[$i][$j]["Cost"] != X AND $table["Demand"][$j] != X) {
//                $min1 = $table[$i][$j]['Cost'];
//            }
//        }
//        if ($table[$i]['Supply']!=X && $min1 - $min > 0)
//            array_push($rowPenalty, $min1 - $min);
//        else
//            array_push($rowPenalty, 0);
//    }
//      echo "min =".$min."</br>min1".$min1;
//     var_dump($rowPenalty);

//    for ($i = 0; $i < $demandCount; $i++) {
//        $min = 1000;
//        $min1 = 1000;
//        for ($j = 0; $j < $supplyCount; $j++) {
//            if ($table[$j][$i]['Cost'] < $min
//                AND $table[$j]["Supply"] != X AND $table["Demand"][$i] != X) {
//                $min = $table[$j][$i]['Cost'];
//            }
//        }
//        for ($j = 0; $j < $supplyCount; $j++) {
//            if ($table[$j][$i]['Cost'] < $min1 AND $table[$j][$i]['Cost'] != $min
//                AND $table[$j][$i]["Cost"] != X AND $table["Demand"][$i] != X) {
//                $min1 = $table[$j][$i]['Cost'];
//            }
//        }
//        if ($table['Demand'][$i]!=X && $min1 - $min > 0)
//            array_push($columnPenalty, $min1 - $min);
//        else
//            array_push($columnPenalty, 0);
//    }
//    tablePrint($table, $supplyCount, $demandCount);
//     var_dump($columnPenalty);
// //row = Supply i = x
//    $x = 0;
//    $y = 0;
//    $min = 9999;
//    $min1 = 9999;
////    echo array_search(max($rowPenalty), $rowPenalty);
////    echo array_search(max($columnPenalty), $columnPenalty);
//    var_dump( max($columnPenalty) < max($rowPenalty));
//    if (max($columnPenalty) < max($rowPenalty)) {
//        $x = array_search(max($rowPenalty), $rowPenalty);
////        $temp = array_column($table, $x);
//        $temp1=[];
//        for ($i=0;$i<$demandCount;$i++)
//            array_push($temp1,$table[$i][$x]['Cost']);
////        $temp = array_column($temp, 'Cost');
//        do{
//            $y = array_search(min($temp1), $temp1);
//            if ($table['Demand'][$y] == X)
//                $temp1[$y] = 1000;
//        }while ($temp1[$y]==1000);
//    }
//    else {
//        $y = array_search(max($columnPenalty), $columnPenalty);
//        $temp = array_column($table, $y);
//        $temp = array_column($temp, 'Cost');
//        do{
//            $x = array_search(min($temp), $temp);
//            if ($table[$x]['Supply'] == X)
//                $temp[$x] = 1000;
//        }while ($temp[$x]==1000);
//    }
//    echo "</br>" . $x . "</br>" . $y . "</br>";
//
//    if ($table[$y]["Supply"] < $table["Demand"][$x]) {
//        $table[$x][$y][0] = $table[$x]["Supply"];
//        $table["Demand"][$y] = $table["Demand"][$y] - $table[$x]["Supply"];
//        $table[$x]["Supply"] = X;
//    } else {
////        echo "</br>" . $x . "</br>" . $y . "</br>";
//        $table[$x][$y][0] = $table["Demand"][$y];
//        $table[$x]["Supply"] = $table[$x]["Supply"] - $table["Demand"][$y];
//        $table["Demand"][$y] = X;
//    }
//    echo " </br> ";
//    tablePrint($table, $supplyCount, $demandCount);


//}
//    echo calcTotalCost($table,$supplyCount,$demandCount);

 ?>
