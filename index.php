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
// Define a route with a parameter
$f3 ->route('GET /breakfast/continental' ,function(){

    //Display a views
    $view = new Template();
   echo $view->render('views/bfast-cont.html');
});

// Define a route with a parameter
$f3 ->route('GET /@item' ,function($f3, $params){

    $item = $params['item'];
    switch ($item)
    {
        case 'spagheytti':
            echo "<h3>I like $item with veggies.</h3>";
            break;
        case 'pizza':
            echo "<h3>Pepperoni or Veggie</h3>";
            break;
        case 'taco':
            echo "<h3>We don't have $item</h3>";
            break;
        case 'bagel':
            $f3->reroute("breakfast/continental");
        default:
            $f3->error(404);

    }
});

// Define  breakfast route
$f3 ->route('GET /lunch/brunch/buffet' ,function (){
    //Display a views
    $view = new Template();
    echo $view->render('views/buffet.html');
});


// Define a route with a parameter
$f3 ->route('GET /@fname/@lname' ,function($f3, $params){

    //uppercase the first letter of string
    $fname = ucfirst($params['fname']);
    $lname = $params['lname'];
    echo "<h2>Hello, $fname $lname !</h2>";
    //Display a views
//    $view = new Template();
//   echo $view->render('views/bfast-cont.html');
});

// Define  form1  route
$f3 ->route('GET /order' ,function (){
    //Display a views
    $view = new Template();
    echo $view->render('views/form1.html');
});

//Run Fat-Free
$f3->run();