<?php
$dird = 'ddd';

$json =[];

function PrintDirectoryTree($startDir, $parent = 0, &$arr = [])
{
    if($parent == 0){
        $json[]['name'] = $startDir;
    }
    $dirs = array_diff(scandir($startDir), ['..', '.']);
    echo count($dirs) . '<br>';
    $i = 0;
    foreach ($dirs as $dir) {
        $pathDir = $startDir . DIRECTORY_SEPARATOR . $dir;
        if(is_dir($pathDir)){
            $arr[$parent]['childrens'][$i]['name'] = $dir;
            $arr[$parent]['childrens'][$i]['path'] = $pathDir;

            PrintDirectoryTree($pathDir, 1, $json);
        }
        $i++;
    }

    $json = $arr;

    return $json;
    ////    echo "</ul>";
    ////    echo "</li>";
    //    if($parent == 0){
    //        echo "</ul>";
    //    }
}

echo '<pre>';
print_r(PrintDirectoryTree($dird));


//function PrintDirectoryTree($startDir, $parent = 0,$name = '')
//{
//    if($parent == 0){
//        echo "<ul id='jsTree'>";
//    }
//    $pathName = !$name ? $startDir : $name;
//    echo "<li data-dirPath='$startDir'>$pathName";
//    echo "<ul>";
//    $dirs = array_diff(scandir($startDir),array('..','.'));
//    foreach ($dirs as $dir) {
//        $pathDir = $startDir . DIRECTORY_SEPARATOR . $dir;
//        if(is_dir($pathDir)){
//            PrintDirectoryTree($pathDir, 1,$dir);
//        }
//    }
//    echo "</ul>";
//    echo "</li>";
//    if($parent == 0){
//        echo "</ul>";
//    }
//}
//
//PrintDirectoryTree($dir);






