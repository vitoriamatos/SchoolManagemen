<?php

$action = isset($_GET['action']) ? $_GET['action'] : $action;

if($action == 'insert'){

    require "..\..\private_directory\models\Discipline.php";
    require "..\..\private_directory\services\DisciplineService.php";
    require "..\..\private_directory\Connection.php";
    $professor = new Professor();
    $discipline = new Discipline(); 
    $discipline->__set('name', $_POST['name']);
    $discipline->__set('schedule', $_POST['schedule']);
    $discipline->__set('days', $_POST['days']);
    $discipline->__set('professor', $_POST['professor']);
    $discipline->__set('student', $_POST['student']);
   

    $connection = new Connection();

    $disciplineService = new DisciplineService($connection, $discipline);
    $disciplineService->insert();


    header('Location: ..\discipline_register.php?include=1');


}else if($action == 'recover'){

    require "..\private_directory\models\Student.php";
    require "..\private_directory\services\StudentService.php";
    require "..\private_directory\Connection.php";
    
    $professor = new Student();
    $connection = new Connection();
    $professorService = new StudentService($connection, $professor);
    $professors = $professorService->backup();

} else if ($action == 'update'){
    require "..\..\private_directory\models\Student.php";
    require "..\..\private_directory\services\StudentService.php";
    require "..\..\private_directory\Connection.php";
    
    $professor = new Student();
    $professor ->__set('id', $_POST['id'])
             ->__set('student', $_POST['student']);
    $connection = new Connection();
    $professorService = new StudentService($connection, $professor);
   if( $professors = $professorService->update()){

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
    
    $professor = new Student();
    $professor->__set('id', $_GET['id']);

    $connection = new Connection();

    $professorService = new StudentService($connection, $professor);
    $professorService->delete();
    if(isset($_GET['pag']) && $_GET['pag'] == 'index'){
        header('location: ..\index.php');

    }else{
        header('location: ..\todas_tarefas.php');
    }
   

}else if($action == 'checkDone'){
    require "..\private_directory\models\Student.php";
    require "..\private_directory\services\StudentService.php";
    require "..\private_directory\Connection.php";
     
    $professor = new Student();
    $professor->__set('id', $_GET['id'])
            ->__set('id_status', 2);

    $connection = new Connection();

    $professorService = new StudentService($connection, $professor);
    $professorService->checkDone();
    
    if(isset($_GET['pag']) && $_GET['pag'] == 'index'){
        header('location: ..\index.php');

    }else{
        header('location: ..\todas_tarefas.php');
    }

}else if($action == 'backupPending'){

    require "..\private_directory\models\Student.php";
    require "..\private_directory\services\StudentService.php";
    require "..\private_directory\Connection.php";
     
    $professor = new Student();
    $professor->__set('id_status', 1);

    $connection = new Connection();

    $professorService = new StudentService($connection, $professor);
    $professors = $professorService->backupPending();
   // header('location: index.php');

}

?>