<?php
echo "Config loaded!<br>";

spl_autoload_register(function ($class) {
    $class_path = str_replace("\\", DIRECTORY_SEPARATOR, $class);

    $file = dirname(__DIR__) . '/classes/' . $class_path . '.php';
    if (file_exists($file)) {
        require_once $file;
        echo "file loaded!";
    } else {
        echo "file path not found";
    }
});
