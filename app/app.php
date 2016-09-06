<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../cars.php";

    $app = new Silex\Application();

    $app->get("/", function() {
        return "
        <!DOCTYPE html>
        <html>
          <head>
            <title></title>
          </head>
          <body>
            <form action='/cars'>
              <input name='minPrice' type='text' placeholder='your minimum price'>
              <input name='maxPrice' type='text' placeholder='your maximum price'>
              <button type='submit'>Press here</button>
            </form>
          </body>
        </html>";
      });
    $app->get("/cars", function() {
        $min_price = $_GET["minPrice"];
        $max_price = $_GET["maxPrice"];

        $civic = new Car(10000, "blue", "Honda");
        $truck = new Car(14000, "red", "Chevy");
        $sports_car = new Car(15000, "red", "Tesla");

        $cars = Array($civic, $truck, $sports_car);

        $cars_within_search = Array();
        $showResult ="";


        foreach($cars as $car) {
          if ($car->getPrice() >= $min_price && $car->getPrice() <= $max_price) {
            array_push($cars_within_search, $car);
          }
        }
        foreach($cars_within_search as $car) {
          $showResult = $showResult . $car->getPrice();
        }
        return "
          <!DOCTYPE html>
          <html>
            <head>
              <title></title>
            </head>
            <body>
              <h1>
                    $showResult
              </h1>
            </body>
          </html>";
        });

    return $app;
?>
