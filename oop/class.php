<?php
  class Oop {
    public $property = "I am a public property";

    public function displayProperty() {
      return $this->property;
    }
  }
  $oopInstance = new Oop();
  echo $oopInstance->displayProperty();


  class Person {
    public $name;

    public function sayHello() {
        return "Hello, my name is " . $this->name;
    }
}

  $moni = new Person();
  $moni->name = "Moni";
  echo $moni->sayHello();

  class Car {
    public $brand;

    public function __construct($brand) {
        $this->brand = $brand;
    }

    public function drive() {
        return "Driving a $this->brand";
    }
}

    $car = new Car("Toyota");
    echo $car->drive();


    class Product {
    private $price;

    public function setPrice($amount) {
        $this->price = $amount;
    }

    public function getPrice() {
        return $this->price;
    }
}

     $p = new Product();
     $p->setPrice(500);
     echo $p->getPrice();
?>