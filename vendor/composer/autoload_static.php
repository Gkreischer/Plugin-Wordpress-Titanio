<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit58ac85a4da1819b4fd25ae6aa48b95a6
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit58ac85a4da1819b4fd25ae6aa48b95a6::$classMap;

        }, null, ClassLoader::class);
    }
}