<?php
define("REPEATS", 1000000);
// Script start
$rustart = getrusage();

// Code ...
$varArray = [];

for ($i = 0; $i < REPEATS; $i++) {
    $ranString = (string)rand(1, 9);
    $conString = "abc";
    $varArray[] = "januszePHPa{$ranString}{$conString}";
}


// Script end
function rutime($ru, $rus, $index) {
    return ($ru["ru_$index.tv_sec"]*1000 + intval($ru["ru_$index.tv_usec"]/1000))
     -  ($rus["ru_$index.tv_sec"]*1000 + intval($rus["ru_$index.tv_usec"]/1000));
}

$ru = getrusage();
echo "This process used " . rutime($ru, $rustart, "utime") .
    " ms for its computations\n";
echo "It spent " . rutime($ru, $rustart, "stime") .
    " ms in system calls\n";