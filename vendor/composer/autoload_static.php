<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfd5a3ebbb2830335060c0901f88c787b
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Smpl\\Logindigiforsdi\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Smpl\\Logindigiforsdi\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitfd5a3ebbb2830335060c0901f88c787b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfd5a3ebbb2830335060c0901f88c787b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfd5a3ebbb2830335060c0901f88c787b::$classMap;

        }, null, ClassLoader::class);
    }
}
