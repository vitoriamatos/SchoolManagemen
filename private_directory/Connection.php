<?php 

class Connection {

     
    private $host = 'localhost';
    private $dbname = 'school-mannagement';
    private $user = 'root';
    private $pass = '';


    public function conect(){
        try{
          $connection = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname",
                "$this->user",
                "$this->pass"
          ); 

         // $query = 'create table tasks(id int not null primary key auto_increment, task varchar(50) not null)';

         
        //$query = 'create table tb_status(id int not null primary key auto_increment, status varchar(50) not null)';
       // $query = 'create table professors(id int not null primary key auto_increment, name varchar(50) not null, bornRegister varchar(50) not null, gender varchar(50) not null, cpf varchar(50) not null, discipline varchar(50) not null)';
      //$query = 'create table disciplines(id int not null primary key auto_increment, name varchar(50) not null,  code varchar(50) not null, days varchar(50) not null, schedule varchar(50) not null, professor varchar(50)not null)';
       //$query = 'create table classes(id int not null primary key auto_increment, name varchar(50) not null, code varchar(50) not null,  professor varchar(50) not null, student varchar(50) not null, discipline varchar(50) not null)';
      // $query = 'inserte table into tasks(discipline varchar(50) not null)';
         
      return $connection; 
//$connection->exec($query);
        }catch (PDOException $e){
            echo 'Erro: '.$e->getCode().' Mensagem: '. $e->getMessage();
        }
    }


}