<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0cffa9394b536b4f87c21842bba87abe
{
    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'services\\juegos\\' => 16,
            'services\\categorias\\' => 20,
        ),
        'm' => 
        array (
            'models\\' => 7,
        ),
        'l' => 
        array (
            'libs\\' => 5,
        ),
        'c' => 
        array (
            'controllers\\' => 12,
        ),
        'M' => 
        array (
            'Mauricio\\JuegosMvc\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'services\\juegos\\' => 
        array (
            0 => __DIR__ . '/../..' . '/services/juegos',
        ),
        'services\\categorias\\' => 
        array (
            0 => __DIR__ . '/../..' . '/services/categorias',
        ),
        'models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models',
        ),
        'libs\\' => 
        array (
            0 => __DIR__ . '/../..' . '/libs',
        ),
        'controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controllers',
        ),
        'Mauricio\\JuegosMvc\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit0cffa9394b536b4f87c21842bba87abe::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0cffa9394b536b4f87c21842bba87abe::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0cffa9394b536b4f87c21842bba87abe::$classMap;

        }, null, ClassLoader::class);
    }
}
