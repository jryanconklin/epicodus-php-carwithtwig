<?php
    $min_price = $_GET["minPrice"];
    $max_price = $_GET["maxPrice"];

    $civic = new Car(10000, "blue", "Honda");
    $truck = new Car(14000, "red", "Chevy");
    $sports_car = new Car(15000, "red", "Tesla");

    $cars = Array($civic, $truck, $sports_car);

    $cars_within_search = Array();

    foreach($cars as $car) {
      if ($car->getPrice() >= $min_price && $car->getPrice() <= $max_price) {
        array_push($cars_within_search, $car);
      }
    }

    class Car
    {
        private $price;
        private $color;
        private $model;
        private $year;
        private $img;

        function __construct($price, $color, $make, $year=2010, $img = "none")
        {
            $this->price = $price;
            $this->color = $color;
            $this->make = $make;
            $this->year = $year;
            $this->img = $img;
        }

        function setPrice($new_price)
        {
            $this->price = $new_price;
        }

        function getPrice()
        {
            return $this->price;
        }

        function setColor($new_color)
        {
            $this->color = $new_color;
        }

        function getColor()
        {
            return $this->color;
        }

        function setMake($new_make)
        {
            $this->make = $new_make;
        }

        function getMake()
        {
            return $this->make;
        }

        function setYear($new_year)
        {
            $this->year = $new_year;
        }

        function getYear()
        {
            return $this->year;
        }

        function setImage($new_image)
        {
            $this->img = "<img src=" . $new_image . ">";
        }

        function getImage()
        {
            return $this->img;
        }

    }
?>

<!-- <!DOCTYPE html>
<html>
  <head>
    <title></title>
  </head>
  <body>
    <h1>
      <?php
          foreach($cars_within_search as $car) {
            echo "car";
          }
      ?>
    </h1>
  </body>
</html> -->
