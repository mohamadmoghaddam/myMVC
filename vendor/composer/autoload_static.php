<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1212a30546c78c3108d526c5d48d4f3a
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'B' => 
        array (
            'Base\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/Core',
        ),
        'Base\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/Base',
        ),
    );

    public static $classMap = array (
        'Base\\Config\\Database' => __DIR__ . '/../..' . '/app/Base/Config/Database.php',
        'Base\\Controllers\\DefaultController' => __DIR__ . '/../..' . '/app/Base/Controllers/DefaultController.php',
        'Base\\Models\\User' => __DIR__ . '/../..' . '/app/Base/Models/User.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Core\\App' => __DIR__ . '/../..' . '/app/Core/App.php',
        'Core\\BaseController' => __DIR__ . '/../..' . '/app/Core/BaseController.php',
        'Core\\Interfaces\\ControllerInterface' => __DIR__ . '/../..' . '/app/Core/Interfaces/ControllerInterface.php',
        'Core\\Interfaces\\UserInterface' => __DIR__ . '/../..' . '/app/Core/Interfaces/UserInterface.php',
        'Core\\Routing' => __DIR__ . '/../..' . '/app/Core/Routing.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1212a30546c78c3108d526c5d48d4f3a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1212a30546c78c3108d526c5d48d4f3a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1212a30546c78c3108d526c5d48d4f3a::$classMap;

        }, null, ClassLoader::class);
    }
}
