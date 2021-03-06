<?php

namespace Zumba\PHPUnit\Extensions\Mongo;

spl_autoload_register(function($classname) {
	$namespaces = array(
		'Zumba' => array(dirname(dirname(dirname(dirname(__DIR__)))) . '/')
	);
	$classname = ltrim($classname, '\\');
	foreach ($namespaces as $ns => $paths) {
		foreach ($paths as $path) {
			$path .= str_replace('\\', DIRECTORY_SEPARATOR, $classname) . '.php';
			if (!file_exists($path)) {
				continue;
			}
			return include $path;
		}
	}
	return false;
});