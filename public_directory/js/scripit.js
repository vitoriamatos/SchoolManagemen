function edit(id, description) {
    //edit form
    let form = document.createElement('form')
    form.action = 'controller/TaskController.php?action=update'
    form.method = 'post'
    form.className = 'row'
    //text input
    let inputTask = document.createElement('input')
    inputTask.type = 'text'
    inputTask.name = 'task'
    inputTask.className = 'form-control'
    inputTask.className = 'col-9 form-control'
    inputTask.value = description

    //input hidden for lock task id

    let inputId = document.createElement('input')
    inputId.type = 'hidden'
    inputId.name = 'id'
    inputId.value = id

    //button

    let button = document.createElement('button');

    button.type = 'submit'
    button.className = 'col-3 btn btn-info'
    button.innerHTML = 'Atualizar'

    // Element tree
    //Inclusion of inputTask on form
    form.appendChild(inputTask)
    
    //Inclusion of inputId on form

    form.appendChild(inputId);

    //Inclusion of button on form
    form.appendChild(button)

    //selec div task

    let task = document.getElementById('task_'+id)

    //clear content for form include

    task.innerHTML = "";


    // inclusion form on page

    task.insertBefore(form,task[0])

}

function remove(id) {
    location.href = 'lista_tarefas.php?action=remove&id='+id;

}

function checkDone(id){

    location.href = 'lista_tarefas.php?action=checkDone&id='+id;

}


//FOR INDEX

function editIndex(id, description) {
    //edit form
    let form = document.createElement('form')
    form.action = 'index.php?pag=index&action=update'
    form.method = 'post'
    form.className = 'row'
    //text input
    let inputTask = document.createElement('input')
    inputTask.type = 'text'
    inputTask.name = 'task'
    inputTask.className = 'form-control'
    inputTask.className = 'col-9 form-control'
    inputTask.value = description

    //input hidden for lock task id
    let inputId = document.createElement('input')
    inputId.type = 'hidden'
    inputId.name = 'id'
    inputId.value = id

    //button
    let button = document.createElement('button');

    button.type = 'submit'
    button.className = 'col-3 btn btn-info'
    button.innerHTML = 'Atualizar'

    // Element tree
    //Inclusion of inputTask on form
    form.appendChild(inputTask)
    
    //Inclusion of inputId on form
    form.appendChild(inputId);

    //Inclusion of button on form
    form.appendChild(button)

    //selec div task

    let task = document.getElementById('task_'+id)

    //clear content for form include
    task.innerHTML = "";


    // inclusion form on page
    task.insertBefore(form,task[0])

}

function removeIndex(id) {
    location.href = 'index.php?pag=index&action=remove&id='+id;

}

function checkDoneIndex(id){

    location.href = 'index.php?pag=index&action=checkDone&id='+id;

}