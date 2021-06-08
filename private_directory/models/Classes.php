<?php

 class Classes{

private $id;
private $name;
private $code;  
private $professor;
private $student;
private $discipline;


public function  __get($atribute){

    return $this->$atribute;
}


public function  __set($atribute, $value){

    $this->$atribute = $value; 
    return $this;
}

 }