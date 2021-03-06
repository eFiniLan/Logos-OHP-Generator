<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit47c07f4d13cea775fb7feae88c52a44d
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PhpOffice\\PhpPresentation\\' => 26,
            'PhpOffice\\Common\\' => 17,
        ),
        'C' => 
        array (
            'Core\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PhpOffice\\PhpPresentation\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpoffice/phppresentation/src/PhpPresentation',
        ),
        'PhpOffice\\Common\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpoffice/common/src/Common',
        ),
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Core',
        ),
    );

    public static $classMap = array (
        'PclZip' => __DIR__ . '/..' . '/pclzip/pclzip/pclzip.lib.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit47c07f4d13cea775fb7feae88c52a44d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit47c07f4d13cea775fb7feae88c52a44d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit47c07f4d13cea775fb7feae88c52a44d::$classMap;

        }, null, ClassLoader::class);
    }
}
