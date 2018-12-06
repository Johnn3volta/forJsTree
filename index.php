<?php
$dir ='wada';
$iter = new RecursiveIteratorIterator(
  new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
  RecursiveIteratorIterator::SELF_FIRST
  // при блоке прав чтения не отвалится

);

$paths = array($dir);
foreach ($iter as $path => $dir) {
    if ($dir->isDir()) {
        $paths[] = $path;
    }
}
print_r($paths);

