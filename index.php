<?php

/**
 * @var array
 *
 * store every directory
 * you want to autoload in
 * this array (Can only be PHP files)
 */
$directories = array(
    './helpers',
    './app',
    './lib/ScriptEngine',
);

/**
 * @param $directory
 *
 * autoloads every directory
 * in the $directories array
 */
function autoload($directories) {
    foreach ($directories as $dir) {
        if (!is_dir($dir)) {
            exit($dir.' is not a directory!');
        }

        foreach (scandir($dir) as $file) {
            if ('.' === $file) {
                continue;
            }

            if ('..' === $file) {
                continue;
            }

            require $dir. '/' .$file;

        }
    }
}

/**
 * autoloads every directory
 * in the $directories array
 */
autoload($directories);

/**
 * @var Object
 *
 * stores the settings object
 */
$settings = new Config();

/**
 * @var Object
 * 
 * loads in every script given
 * in the settings array/string
 */
$script = new ScriptLoader();

/**
 * @var Object
 *
 * stores the Application object
 * and starts the MVC system
 */
$router = new Router();

