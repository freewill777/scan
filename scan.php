<?php

$path = $argv[1];
$currentTime = filemtime($path);

while(true) {
    clearCache($path);
    checkPath($path);
    sleep(1);
}

function clearCache($path) {
    clearstatcache(false, $path);
}

function checkPath($path) {
    global $currentTime;
    $newTime = filemtime($path);
    echo $currentTime. ' '.$newTime.PHP_EOL;
    if ($newTime != $currentTime) {
        echo "File was modified...".PHP_EOL;
        $currentTime = $newTime;
    }
}



?>