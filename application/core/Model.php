<?php

use TestTaskQDigital\Task;

class Model
{

    public Task $entity;

    function __construct()
    {
        include "application/entity/task.php";
        $this->entity = new Task();
    }

}