<?php

$action = isset($_GET['action']) ? $_GET['action'] : $action;

if($action == 'insert'){

    require "..\..\private_directory\models\Task.php";
    require "..\..\private_directory\services\TaskService.php";
    require "..\..\private_directory\Connection.php";
    
    $task = new Task(); 
    $task->__set('task', $_POST['task']);
    $task->__set('discipline',intval( $_POST['discipline']));

    $connection = new Connection();

    $taskService = new TaskService($connection, $task);
    $taskService->insert();


    header('Location: ..\registro_tarefa.php?include=1');


}else if($action == 'recover'){

    require "..\private_directory\models\Task.php";
    require "..\private_directory\services\TaskService.php";
    require "..\private_directory\Connection.php";
    
    $task = new Task();
    $connection = new Connection();
    $taskService = new TaskService($connection, $task);
    $tasks = $taskService->backup();

} else if ($action == 'update'){
    require "..\..\private_directory\models\Task.php";
    require "..\..\private_directory\services\TaskService.php";
    require "..\..\private_directory\Connection.php";
    
    $task = new Task();
    $task ->__set('id', $_POST['id'])
          ->__set('task', $_POST['task']);
    $connection = new Connection();
    $taskService = new TaskService($connection, $task);
   if( $tasks = $taskService->update()){

    if(isset($_GET['pag']) && $_GET['pag'] == 'index'){
        header('location: ..\index.php');

    }else{
        header('location: ..\todas_tarefas.php');
    }
   
}
     


}else if($action == 'remove'){
    require "..\private_directory\models\Task.php";
    require "..\private_directory\services\TaskService.php";
    require "..\private_directory\Connection.php";
    
    $task = new Task();
    $task->__set('id', $_GET['id']);

    $connection = new Connection();

    $taskService = new TaskService($connection, $task);
    $taskService->delete();
    if(isset($_GET['pag']) && $_GET['pag'] == 'index'){
        header('location: ..\index.php');

    }else{
        header('location: ..\lista_tarefas.php');
    }
   

}else if($action == 'checkDone'){
    require "..\private_directory\models\Task.php";
    require "..\private_directory\services\TaskService.php";
    require "..\private_directory\Connection.php";
     
    $task = new Task();
    $task->__set('id', $_GET['id'])
        ->__set('id_status', 2);

    $connection = new Connection();

    $taskService = new TaskService($connection, $task);
    $taskService->checkDone();
    
    if(isset($_GET['pag']) && $_GET['pag'] == 'index'){
        header('location: ..\index.php');

    }else{
        header('location: ..\lista_tarefas.php');
    }

}else if($action == 'backupPending'){

    require "..\private_directory\models\Task.php";
    require "..\private_directory\services\TaskService.php";
    require "..\private_directory\Connection.php";
     
    $task = new Task();
    $task->__set('id_status', 1);

    $connection = new Connection();

    $taskService = new TaskService($connection, $task);
    $tasks = $taskService->backupPending();
   // header('location: index.php');

}

?>