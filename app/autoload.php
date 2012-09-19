<?php

use Doctrine\Common\Annotations\AnnotationRegistry;

$loader = require __DIR__.'/../vendor/autoload.php';


//// Se agrega hasta que se solucione el issue:
//// https://github.com/comfortablynumb/BackupRestoreBundle/issues/1
    $loader->add('ENC',__DIR__.'/../vendor/bundles');
    $loader->register();
////

// intl
if (!function_exists('intl_get_error_code')) {
    require_once __DIR__.'/../vendor/symfony/symfony/src/Symfony/Component/Locale/Resources/stubs/functions.php';

    $loader->add('', __DIR__.'/../vendor/symfony/symfony/src/Symfony/Component/Locale/Resources/stubs');
}

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

return $loader;
