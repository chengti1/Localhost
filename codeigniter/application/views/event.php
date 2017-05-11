<?php
header('Content-Type: application/json; charset=utf-8');
$json = array(
	array(
		"date" => "2016-01-21", 
		"option" => array(
		"number" => 5
		)
	), 
	array(
		"date" => "2016-01-22", 
		"option" => array(
		"number" => 10, 
		)
	),
	array(
		"date" => "2016-01-19", 
		"option" => array(
		"number" => 12, 
		)
	)
);
echo json_encode($json);
?>