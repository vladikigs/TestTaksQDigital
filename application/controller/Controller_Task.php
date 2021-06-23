<?php


class Controller_Task extends Controller
{

    private Model_Task $modelTask;

    function __construct() {
        parent::__CONSTRUCT();
        $this->modelTask = new Model_Task();
    }

    function action_addTask()
    {
        $description = $_POST['description'];
        $data = $this->modelTask->addTask($description);
        $this->view->generate('task_view.php', 'template_view.php', $data);
    }

    function action_taskList()
    {
        $data = $this->modelTask->getTaskList();
        $this->view->generate('task_view.php', 'template_view.php', $data);
    }

    function action_allTasksCompleted()
    {
        $data = $this->modelTask->setAllTasksCompleted();
        $this->view->generate('task_view.php', 'template_view.php', $data);
    }

    function action_deleteAllTasks()
    {
        $data = $this->modelTask->deleteAllTasks();
        $this->view->generate('task_view.php', 'template_view.php', $data);
    }

    function action_delete()
    {
        $id = $_POST['id'];
        $data = $this->modelTask->deleteTask($id);
        $this->view->generate('task_view.php', 'template_view.php', $data);
    }

    function action_unready()
    {
        $id = $_POST['id'];
        $data = $this->modelTask->setStatusTask($id, false);
        $this->view->generate('task_view.php', 'template_view.php', $data);
    }
    function action_ready()
    {
        $id = $_POST['id'];
        $data = $this->modelTask->setStatusTask($id, true);
        $this->view->generate('task_view.php', 'template_view.php', $data);
    }

}