<?php 

spl_autoload_register('my_autoloader');


function my_autoloader($className) {
    $path = 'classes/';
    $extension = '.classes.php';
    if (strpos($className, 'classes/') === 0) {
        $fullPath = $className . $extension;
    } else {
        $fullPath = 'classes/' . $className . $extension;
    }

    if (!file_exists($fullPath)) {
        return false;
    }
    include $fullPath;
}

