<?php

 class Discipline{

private $id;
private $name; 
private $schedule; 
private $days;
private $professor;
private $student;


public function  __get($atribute){

    return $this->$atribute;
}


public function  __set($atribute, $value){

    $this->$atribute = $value; 
    return $this;
}

 }