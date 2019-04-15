<?php
/**
 * Name: Sukhveer S Jawandha
* 4/8/2019
* 328/food/index.php
 *
 * Practice Routing
 */

//Turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

//Require autoload file
require_once ('vendor/autoload.php');

//create an instance of the Base class
$f3 = Base::instance();
//Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

// Define a default route
$f3->route('GET /' , function (){
    //Display a views
    $view = new Template();
    echo $view->render('views/home.html');
});

// Define  breakfast route
$f3 ->route('GET /breakfast/continental' ,function (){
    //Display a views
    $view = new Template();
    echo $view->render('views/bfast-cont.html');
});

// Define  breakfast route
$f3 ->route('GET /lunch/brunch/buffet' ,function (){
    //Display a views
    $view = new Template();
    echo $view->render('views/buffet.html');
});


//Run Fat-Free
$f3->run();