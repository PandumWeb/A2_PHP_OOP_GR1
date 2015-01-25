<?php

session_start();

$em = require __DIR__.'/bootstrap.php';


 Twig_Autoloader::register();
 $loader = new Twig_Loader_Filesystem([
     __DIR__.'/views',
 ]);

 $twig = new Twig_Environment($loader, [
//'cache' => null,
 ]);










