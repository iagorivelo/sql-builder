<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitd2f28f88261de38a0941cfdc2cba83cc
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

        spl_autoload_register(array('ComposerAutoloaderInitd2f28f88261de38a0941cfdc2cba83cc', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitd2f28f88261de38a0941cfdc2cba83cc', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitd2f28f88261de38a0941cfdc2cba83cc::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
