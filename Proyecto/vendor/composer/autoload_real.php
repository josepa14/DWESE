<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitbee6d71b7a167ee5e64fa1efd2c1c733
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitbee6d71b7a167ee5e64fa1efd2c1c733', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitbee6d71b7a167ee5e64fa1efd2c1c733', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitbee6d71b7a167ee5e64fa1efd2c1c733::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}