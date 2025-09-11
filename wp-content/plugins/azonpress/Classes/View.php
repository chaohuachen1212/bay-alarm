<?php namespace Azonpress\Classes;

class View
{
    public static function make($path, $data = [])
    {
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        $file = AZONPRESS_PLUGIN_PATH.'resources/views/'.$path.'.php';

        ob_start();
        extract($data);
        include $file;
        return ob_get_clean();
    }

    public static function render($path, $data = [])
    {
        echo static::make($path, $data);
    }
}
