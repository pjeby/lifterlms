<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3ebae7a6b8cb544938110bc79d0c7bbc
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'LLMS\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'LLMS\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3ebae7a6b8cb544938110bc79d0c7bbc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3ebae7a6b8cb544938110bc79d0c7bbc::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}