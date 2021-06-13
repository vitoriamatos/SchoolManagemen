<?php

 class Discipline{

private $id;
private $name; 
private $code;
private $days;
private $schedule; 
private $professor;



public function  __get($atribute){

    return $this->$atribute;
}


public function  __set($atribute, $value){

    $this->$atribute = $value; 
    return $this;
}

 }