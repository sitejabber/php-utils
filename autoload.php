<?php
spl_autoload_register(function ($class) {
    // Make sure that the class being loaded is in the sitejabber namespace
    if (substr(strtolower($class), 0, 11) !== 'sitejabber\\')
        return;

    // Locate and load the file that contains the class
    $path = __DIR__ . '/src/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($path))
        require($path);
});
