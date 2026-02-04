<?php

$str="i am mounika from cse department";
// basic string functions
echo "string length:".strlen($str). "<br>";
echo "string word count:".str_word_count($str). "<br>";
echo "string reverse:".strrev($str). "<br>";
//case conversion
echo "string upper:" .strtoupper($str). "<br>";
echo "string lover:" .strtolower($str). "<br>";
echo "ucfirst:" .ucfirst($str). "<br>";
echo "ucwords:".ucwords($str). "<br>";
//search and replace
echo "string postion:" .strpos($str,"cse"). "<br>";
echo "string replace:" .str_replace($str,"cse","ece")."<br>";

//substring and trimming
echo "substring:" .substr($str,0,10). "<br>";
echo "trimming:".trim($str)."<br>";
echo "ltrim:" .ltrim($str). "<br>";
echo "rtrim:" .rtrim($str). "<br>";
//string comparison

$str1="rgukt nuzvid";
echo "strimg comparison:" .strcmp($str,$str1). "<br>";
echo "stringcasecmp:".strcasecmp($str,$str1)."<br>";
//special charecters and security
echo "htmlspecialchrs:".htmlspecialchars($str)."<br>";
echo "addslashes:".addslashes("it is my page"). "<br>";