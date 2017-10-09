<?php
	$catalog = [];

	$catalog["aydemir"] = [
		"title" => "Aydemir Plaza",
		"imageCount" => 9,
	  "images" => [  ]
	];
	$catalog["cesme"] = [
	    "title" => "Çeşme Plus Hotel",
			"imageCount" => 10,
	    "images" => [  ]
	];
	$catalog["samsung"] = [
	    "title" => "Samsung Showroom",
			"imageCount" => 10,
	    "images" => [  ]
	];
	$catalog["yukselis"] = [
	    "title" => "Yükseliş İnşaat",
			"imageCount" => 7,
	    "images" => [  ]
	];
	$catalog["metz"] = [
	    "title" => "Metz Otel",
			"imageCount" => 8,
	    "images" => [  ]
	];

	foreach ($catalog as $key => $value) {
		$filePath="img/{$catalog[$key]["title"]}";
			for ($j=1; $j <= $catalog[$key]["imageCount"] ; $j++) {
						array_push($catalog[$key]["images"],$filePath."/".$j.".jpg");
			}
	}
	//  var_dump($catalog);
?>
