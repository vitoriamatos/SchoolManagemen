<?php

$action = 'recover';
define('ROOT_PATH', dirname(__FILE__));
//require '../public_directory/controller/TaskController.php';
chdir(ROOT_PATH);
//die(var_dump(ROOT_PATH . '/controller/TaskController.php'));
require ROOT_PATH . '\controller\ProfessorController.php';


?>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Colégio BD</title>

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
                    <a href="index.php" class="nav-link">Home</a>
                </li>
               
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Professores</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="registro_professor.php" class="dropdown-item">Cadastrar</a>
						<div class="dropdown-divider"></div>
                        <a href="lista_professores.php" class="dropdown-item">Exibir todos</a>
                    </div>
                </li>
				<li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Aluno</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="registro_aluno.php" class="dropdown-item">Cadastrar</a>
						<div class="dropdown-divider"></div>
                        <a href="lista_alunos.php" class="dropdown-item">Exibir todos</a>
                    </div>
                </li>
				<li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Disciplina</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="registro_disciplina.php" class="dropdown-item">Cadastrar</a>
						<div class="dropdown-divider"></div>
                        <a href="lista_disciplina.php" class="dropdown-item">Exibir todas</a>  
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Turma</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="registro_turma.php" class="dropdown-item">Cadastrar</a>
						<div class="dropdown-divider"></div>
                        <a href="lista_turmas.php" class="dropdown-item">Exibir todas</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item "><a href="registro_professor.php">Cadastro</a></li>
						<li class="list-group-item active"><a href="lista_professores.php">Todos os Professores</a></li>
						<li class="list-group-item "><a href="nova_tarefas.php">Cadastrar Tarefa</a></li>
						<li class="list-group-item"><a href="todas_tarefas.php">Todas Tarefas</a></li>
						<li class="list-group-item"><a href="PeddingTasks.php">Tarefas pendentes</a></li>

					</ul>
				</div>

				<div class="col-sm-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Professores Registrados</h4>
								<hr />
									<?php foreach($professors as $index => $professor): ?>
										<div class="row mb-3 d-flex align-items-center tarefa">
										<div class="col-sm-9" id="task_<?= $professor->id ?>"><?= $professor->name ?> </div>
										<div class="col-sm-3 mt-2 d-flex justify-content-between">

											</div>
										</div>
								   <?php endforeach ?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</body>
</html>