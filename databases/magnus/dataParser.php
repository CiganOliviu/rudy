<?php
	
	$Data = fopen ("data/programming_languages_classification_json.data", "r") or die ("Unable to open file");

	while(!feof($Data)) {

	  echo(fgets($Data) . "<br>");
	}

	fclose($Data);

?>