<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit46b64d406b427f1f26fde97b2b15763a
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MyProject1\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MyProject1\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit46b64d406b427f1f26fde97b2b15763a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit46b64d406b427f1f26fde97b2b15763a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
