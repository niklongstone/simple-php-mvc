<?php

class Autoloader
{
    static public function loader($className)
    {
        $filename =  str_replace('\\', DIRECTORY_SEPARATOR, $className) . ".php";
        if (file_exists($filename)) {
            include($filename);
            if (class_exists($className)) {
            return true;
            }
        }

    return true;
    }
}

spl_autoload_register('Autoloader::loader');

