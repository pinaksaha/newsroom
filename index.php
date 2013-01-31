<?php
	$verge = simplexml_load_file('http://www.theverge.com/rss/index.xml');
	//$xml = simplexml_load_string($verge,$verge);
	//$xml = $verge->asXML();
	//$xml = preg_replace ('/<[^>]*>/', ' ', $xml);
	//$xml = str_replace("\r", '', $xml);    // --- replace with empty space
    //$xml = str_replace("\n", ' ', $xml);   // --- replace with space
    //$xml = str_replace("\t", ' ', $xml);   // --- replace with space
    //$xml = trim(preg_replace('/ {2,}/', ' ', $xml));
    
	$json = json_encode($verge);
	
	$json = json_decode($json,true);
	
	print("<pre>");
	print_r($json);
	//var_dump($json);
	print("</pre>");
?>