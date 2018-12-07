<?php

$ddr = $_SERVER['DOCUMENT_ROOT'] . '/ddd';

//$odir = opendir($dir);
//while (($file = readdir($odir)) != false){
//    if($file != '.' && $file != '..'){
//        echo $file.'<br>';
//    }
//
//}
//closedir($odir);
//

//function cur($dir){
//
//
//$cat = dir($dir);
//
//while (($file = $cat->read()) !== FALSE)
//{
//    if ($file != '.' && $file != '..')
//    {
//        echo fileinode($file).'<br>';
//        echo $cat->path.'<br>';
//        if(is_dir($file)) cur($file);
//    }
//}
//
//$cat->close();
//
//}
//
//cur($ddr);

//function recursive($dir)
//{
//    static $deep = 0;
//    static $arr = [];
//
//    $odir = opendir($dir);
//
//    echo count($odir);
//
//    while (($file = readdir($odir)) !== false){
//        if ($file == '.' || $file == '..'){
//            continue;
//        }else{
//            print str_repeat('---', $deep) . $dir . DIRECTORY_SEPARATOR . $file. ' - ' . $deep . '<br>';
//        }
//
//        if (is_dir($dir . DIRECTORY_SEPARATOR . $file)){
//            $deep++;
//            echo 'gg';
//            recursive($dir . DIRECTORY_SEPARATOR . $file);
//            $deep--;
//        }
//    }
//    closedir($odir);
//}
//
//recursive($ddr);

$json = [];
$dird = 'ax';


function PrintDirectoryTree($path,$name ='')
{


    $arr = [
      'text' => $name ? $name : str_replace($_SERVER['DOCUMENT_ROOT'].'/','',$path),
//      'path' => $path
    ];
    $dirs = array_diff(scandir($path), ['..', '.']);

    if (count($dirs) > 0){
        foreach ($dirs as $dir){
            $pathDir = $path . DIRECTORY_SEPARATOR . $dir;
            if (is_dir($pathDir)){

                $chld[] = PrintDirectoryTree($pathDir,$dir);
            }
        }
        /** @var $chld */
        $chld ? $arr['children'] = $chld : null;
    }

    return $arr;

}

$rtk[] = PrintDirectoryTree($ddr);

echo json_encode($rtk);

