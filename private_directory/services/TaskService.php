<?php 

class TaskService {
   
    private $connection;
    private $task;


    public function __construct(Connection $connection, Task $task){
        $this->connection = $connection->conect();
        $this->task = $task;  
    }
    

    public function insert(){
        $query = 'insert into tasks(task)values(:task)';
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':task', $this->task->__get('task'));
        $stmt->execute();
    }

    public function backup(){
        $query = 'SELECT t.id, s.status, t.task 
                  FROM tasks AS t
                  LEFT JOIN tb_status AS s ON (t.id_status = s.id )';
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ); // for object array return 
       
    }

    public function update(){

        $query = "UPDATE tasks set task = ? WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(1, $this->task->__get('task'));
        $stmt->bindValue(2, $this->task->__get('id'));
        return $stmt->execute();
    }

    public function delete(){
        $query = "DELETE FROM tasks WHERE id = ?";
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