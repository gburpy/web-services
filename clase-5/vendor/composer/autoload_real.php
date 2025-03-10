<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit5619829f5c5bb70097e7aa83fa3ef2fc
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

        spl_autoload_register(array('ComposerAutoloaderInit5619829f5c5bb70097e7aa83fa3ef2fc', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit5619829f5c5bb70097e7aa83fa3ef2fc', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit5619829f5c5bb70097e7aa83fa3ef2fc::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
