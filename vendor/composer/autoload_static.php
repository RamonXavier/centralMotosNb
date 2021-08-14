<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit299b6293e3c9beda20a98d2e6f42e1b3
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit299b6293e3c9beda20a98d2e6f42e1b3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit299b6293e3c9beda20a98d2e6f42e1b3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit299b6293e3c9beda20a98d2e6f42e1b3::$classMap;

        }, null, ClassLoader::class);
    }
}