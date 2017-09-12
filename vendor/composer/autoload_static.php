<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit56c929ff8ea3b6705dba9160bde84d4f
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'RCPCommbank\\' => 12,
        ),
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'RCPCommbank\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit56c929ff8ea3b6705dba9160bde84d4f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit56c929ff8ea3b6705dba9160bde84d4f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
