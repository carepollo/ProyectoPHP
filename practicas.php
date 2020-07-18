<?php

$var1 = 1;
$var2 = 0.5;

echo gettype($var1)."<br>";
echo gettype($var2)."<br>";

$var1 += 0.5;
$var2 += 0.5;

echo gettype($var1)."<br>";
echo gettype($var2)."<br>";

echo gettype(intval($var1));
?>