<?php

$action = 'backupPending';
//require '..\controller\TaskController.php';

define('ROOT_PATH', dirname(__FILE__));
//require '../public_directory/controller/TaskController.php';
chdir(ROOT_PATH);
//die(var_dump(ROOT_PATH . '/controller/TaskController.php'));
require ROOT_PATH . '\controller\TaskController.php';



?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Lista Tarefas</title>

		<script type="text/javascript" src="js/scripit.js"></script>
		<link rel="stylesheet" href="view/css/style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
	
	</head>

	<body>
	<div class="bs-example">
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a href="#" class="navbar-brand">Colégio BD</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbarCollapse" class="collapse navbar-collapse">	
            <ul class="nav navbar-nav ml-auto">
				<li class="nav-item ">
                    <a href="#" class="nav-link">Home</a>
                </li>
               
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Professores</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="professor_register.php" class="dropdown-item">Cadastrar</a>
						<div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">Exibir todos</a>
                        <div class="dropdown-divider"></div>
                        <a href="nova_tarefa.php"class="dropdown-item">Tarefas</a>
                    </div>
                </li>
				<li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Aluno</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="student_register.php" class="dropdown-item">Cadastrar</a>
						<div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">Exibir todos</a>
                        <div class="dropdown-divider"></div>
                        <a href="todas_tarefas.php"class="dropdown-item">Tarefas</a>
                    </div>
                </li>
				<li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Disciplina</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item">Cadastrar</a>
						<div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">Exibir todas</a>
                       
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Turma</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="classes_register.php" class="dropdown-item">Cadastrar</a>
						<div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">Exibir todas</a>
                       
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
	</body>
</html>