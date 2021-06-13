<?php

$action = isset($_GET['action']) ? $_GET['action'] : $action;

if($action == 'insert'){

    require "..\..\private_directory\models\Professor.php";
    require "..\..\private_directory\services\ProfessorService.php";
    require "..\..\private_directory\Connection.php";
    
    $professor = new Professor(); // recover the professor obj and the database conection 
    $professor->__set('name', $_POST['name']);
    $professor->__set('gender', $_POST['gender']);
    $professor->__set('bornRegister', $_POST['bornRegister']);
    $professor->__set('cpf', $_POST['cpf']);

    $connection = new Connection();

    $professorService = new ProfessorService($connection, $professor);
    $professorService->insert();


    header('Location: ..\registro_professor.php?include=1');


} 

if($action == 'recover'){

    require "..\private_directory\models\Professor.php";
    require "..\private_directory\services\ProfessorService.php";
    require "..\private_directory\Connection.php";
    
    $professor = new Professor();
    $connection = new Connection();
    $professorService = new ProfessorService($connection, $professor);
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