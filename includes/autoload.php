<?php
namespace Proshots;

class Autoload {

    public static function autoload() {
        $files = glob(PROSHOT_INCLUDES_DIR_PATH . '*.php');
        
        foreach ($files as $file) {
            if (file_exists($file)) {
                require_once $file;
            }
        }
    }    

    public static function init() {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }
}

Autoload::init();