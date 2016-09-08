<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/cars.php";

    session_start();
    if (empty($_SESSION['cars'])) {
        $_SESSION['cars'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));


    $app->get("/", function() use ($app) {

        return $app['twig']->render('cars-form.html.twig');
    });

    $app->get("/cars", function() use ($app) {
        $min_price = $_GET["minPrice"];
        $max_price = $_GET["maxPrice"];
        $civic = new Car(10000, "blue", "Honda");
        $truck = new Car(14000, "red", "Chevy");
        $sports_car = new Car(15000, "red", "Tesla");
        $available_cars = array($civic, $truck, $sports_car);
        $cars_matching_search = array();
        foreach ($available_cars as $car) {
            if ($car->worthBuying($max_price,$min_price)) {
                array_push($cars_matching_search, $car);
            }
        }
        return $app['twig']->render('cars-results.html.twig', array('cars' => $cars_matching_search));

    });

    return $app;
?>
