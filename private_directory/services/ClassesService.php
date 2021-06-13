<?php 

class ClassesService {
    
    private $connection;
    private $classes;

/*
    public function __construct(Connection $connection, Discipline $discipline, Student $student, Professor $professor, Classes $classes){
        $this->connection = $connection->conect();
        $this->discipline = $discipline; 
        $this->classes = $classes;
        $this->student = $student;
        $this->professor = $professor;
    }
    */

    public function __construct(Connection $connection, Classes $classes){
        $this->connection = $connection->conect();
        $this->classes = $classes;
    
    }

    public function insert(){
        $query = 'insert into classes(name, code, professor)values(?,?,?)';
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(1, $this->classes->__get('name'));
        $stmt->bindValue(2, $this->classes->__get('code'));
        $stmt->bindValue(3, $this->classes->__get('professor'));
        $stmt->execute();
    }

    public function backup(){
            $query = 'SELECT professor.name
                      FROM professor AS professors';

        //$query = 'SELECT student.id, student.name, student.gender, student.bornRegister, student.cpf 
          //        FROM students AS student';
                //  LEFT JOIN tb_status AS s ON (t.id_status = s.id )';
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ); // for object array return 
       
    }

    public function update(){

        $query = "UPDATE students set name = ? WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(1, $this->task->__get('name'));
        $stmt->bindValue(2, $this->task->__get('id'));
        return $stmt->execute();
    }

    public function delete(){
        $query = "DELETE FROM students WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(1, $this->task->__get('id'));
        $stmt->execute();
    }


    public function checkDone(){

        $query = "UPDATE tasks set id_status = ? WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(1, $this->task->__get('id_status'));
        $stmt->bindValue(2, $this->task->__get('id'));
        return $stmt->execute();
    }

    public function backupPending(){

        $query = 'SELECT t.id, s.status, t.task 
                  FROM tasks AS t
                  LEFT JOIN tb_status AS s ON (t.id_status = s.id )
                  WHERE t.id_status = :id_status';
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':id_status', $this->task->__get('id_status'));
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ); // for object array return 
    }

}