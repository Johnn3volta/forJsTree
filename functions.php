<?php

$dir = 'wada';
function PrintDirectoryTree($startDir, $parent = 0,$name = '')
{
    if($parent == 0){
        echo "<ul id='jsTree'>";
    }
    $pathName = !$name ? $startDir : $name;
    echo "<li data-dirPath='$startDir'>$pathName";
    echo "<ul>";
    $dirs = array_diff(scandir($startDir),array('..','.'));
    foreach ($dirs as $dir) {
        $pathDir = $startDir . DIRECTORY_SEPARATOR . $dir;
        if(is_dir($pathDir)){
            PrintDirectoryTree($pathDir, 1,$dir);
        }
    }
    echo "</ul>";
    echo "</li>";
    if($parent == 0){
        echo "</ul>";
    }
}

PrintDirectoryTree($dir);