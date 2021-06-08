<?php

 class Professor{

    
    private $id;
    private $register;
    private $name;//task
    private $gender;
    private $cpf;
    private $age;
    private $discipline;



public function  __get($atribute){

    return $this->$atribute;
}


public function  __set($atribute, $value){

    $this->$atribute = $value; 
    return $this;
}

 }