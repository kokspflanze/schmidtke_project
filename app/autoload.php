<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/**
 * @var ClassLoader $loader
 */
$loader = require __DIR__.'/../vendor/autoload.php';

$loader->add('Igel',__DIR__.'/../src');
$loader->add('Admin',__DIR__.'/../src');

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

return $loader;
