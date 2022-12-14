<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1abd8d3bd2f0a2a16d767b0e57d4723d
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'DgoraWcas\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'DgoraWcas\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1abd8d3bd2f0a2a16d767b0e57d4723d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1abd8d3bd2f0a2a16d767b0e57d4723d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1abd8d3bd2f0a2a16d767b0e57d4723d::$classMap;

        }, null, ClassLoader::class);
    }
}
