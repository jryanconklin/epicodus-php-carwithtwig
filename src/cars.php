<?php
    class Car
    {
        private $price;
        private $color;
        private $make;
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

//Getters and Setters
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
//Methods
        function save()
        {
            array_push($_SESSION['cars'], $this);
        }
        function worthBuying($max_price, $min_price)
        {
            $output = false;
            if (($this->price <= $max_price) && ($this->price >= $min_price)) {
                $output = true;
            }
            return $output;
        }

//Static Methods
        static function getAll()
        {
            return $_SESSION['cars'];
        }
        static function deleteAll()
        {
            $_SESSION['cars'] = array();
        }
    }
?>
