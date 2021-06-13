<?php

$action = isset($_GET['action']) ? $_GET['action'] : $action;

if($action == 'insert'){

    require "..\..\private_directory\models\Student.php";
    require "..\..\private_directory\services\StudentService.php";
    require "..\..\private_directory\Connection.php";
    
    $student = new Student(); // recover the student obj and the database conection 
    $student->__set('name', $_POST['name']);
    $student->__set('gender', $_POST['gender']);
    $student->__set('bornRegister', $_POST['bornRegister']);
    $student->__set('cpf', $_POST['cpf']);
    $student->__set('discipline', $_POST['discipline']);

    $connection = new Connection();

    $studentService = new StudentService($connection, $student);
    $studentService->insert();


    header('Location: ..\registro_estudante.php?include=1');


}else if($action == 'recover'){

    require "..\private_directory\models\Student.php";
    require "..\private_directory\services\StudentService.php";
    require "..\private_directory\Connection.php";
    
    $student = new Student();
    $connection = new Connection();
    $studentService = new StudentService($connection, $student);
    $students = $studentService->backup();

} else if ($action == 'update'){
    require "..\..\private_directory\models\Student.php";
    require "..\..\private_directory\services\StudentService.php";
    require "..\..\private_directory\Connection.php";
    
    $student = new Student();
    $student ->__set('id', $_POST['id'])
             ->__set('student', $_POST['student']);
    $connection = new Connection();
    $studentService = new StudentService($connection, $student);
   if( $students = $studentService->update()){

    if(isset($_GET['pag']) && $_GET['pag'] == 'index'){
        header('location: ..\index.php');

    }else{
        header('location: ..\todas_tarefas.php');
    }
   
}


}else if($action == 'remove'){
    require "..\private_directory\models\Student.php";
    require "..\private_directory\services\StudentService.php";
    require "..\private_directory\Connection.php";
    
    $student = new Student();
    $student->__set('id', $_GET['id']);

    $connection = new Connection();

    $studentService = new StudentService($connection, $student);
    $studentService->delete();
    if(isset($_GET['pag']) && $_GET['pag'] == 'index'){
        header('location: ..\index.php');

    }else{
        header('location: ..\todas_tarefas.php');
    }
   

}else if($action == 'checkDone'){
    require "..\private_directory\models\Student.php";
    require "..\private_directory\services\StudentService.php";
    require "..\private_directory\Connection.php";
     
    $student = new Student();
    $student->__set('id', $_GET['id'])
            ->__set('id_status', 2);

    $connection = new Connection();

    $studentService = new StudentService($connection, $student);
    $studentService->checkDone();
    
    if(isset($_GET['pag']) && $_GET['pag'] == 'index'){
        header('location: ..\index.php');

    }else{
        header('location: ..\todas_tarefas.php');
    }

}else if($action == 'backupPending'){

    require "..\private_directory\models\Student.php";
    require "..\private_directory\services\StudentService.php";
    require "..\private_directory\Connection.php";
     
    $student = new Student();
    $student->__set('id_status', 1);

    $connection = new Connection();

    $studentService = new StudentService($connection, $student);
    $students = $studentService->backupPending();
   // header('location: index.php');

}

?>