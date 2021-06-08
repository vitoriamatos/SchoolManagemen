<?php

 class Student{

private $id;
private $name;//task
private $gender;
private $cpf;
private $bornRegister;
private $discipline;



public function  __get($atribute){

    return $this->$atribute;
}


public function  __set($atribute, $value){

    $this->$atribute = $value; 
    return $this;
}

 }