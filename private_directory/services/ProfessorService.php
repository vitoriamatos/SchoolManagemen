<?php 

class ProfessorService {
    /*
       CRUD OPERATION
    */
    private $connection;
    private $profesor;


    public function __construct(Connection $connection, Professor $professor){
        $this->connection = $connection->conect();
        $this->professor = $professor;  
    }
    

    public function insert(){
        $query = 'insert into professors(name, bornRegister, gender, cpf, discipline)values(?,?,?,?,?)';
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(1, $this->professor->__get('name'));
        $stmt->bindValue(2, $this->professor->__get('bornRegister'));
        $stmt->bindValue(3, $this->professor->__get('gender'));
        $stmt->bindValue(4, $this->professor->__get('cpf'));
        $stmt->execute();
    }

    public function backup(){
        $query = 'SELECT name FROM professors';
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