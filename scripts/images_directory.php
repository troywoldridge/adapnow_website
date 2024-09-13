<?php

$directory = '/home/troy/adap_now-website/public/images';
$output_file = 'images_directory_list.txt';

$file = fopen($output_file, 'w');

$objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
foreach($objects as $name => $object){
    fwrite($file, $name . PHP_EOL);
}

fclose($file);

echo "File list created and saved to $output_file";
?>
