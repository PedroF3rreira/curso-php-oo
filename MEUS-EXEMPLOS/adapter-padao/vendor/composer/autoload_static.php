<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit671b5a6eb7886457b21ffa26d20fd96d
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'DesignPatterns\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'DesignPatterns\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit671b5a6eb7886457b21ffa26d20fd96d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit671b5a6eb7886457b21ffa26d20fd96d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit671b5a6eb7886457b21ffa26d20fd96d::$classMap;

        }, null, ClassLoader::class);
    }
}
