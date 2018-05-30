<?php

// Defined in composer.json
//
// "autoload": {
// 	"psr-4": {
// 		"App\\": "app"
// 	}
// }
//
// App\:	name of application (extra '\' is needed to escape \)
// app:		dir of App
//
// then run `composer dump-autoload` and  namespace will be included in autoload function

// namespace useful for creating instance of class
// no need to add full path of class
// e.g. $obj = new \App\Controllers\ClassName;
namespace App\Controllers;


