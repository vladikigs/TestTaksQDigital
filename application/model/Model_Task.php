<?php


use TestTaskQDigital\Task;

class Model_Task extends Model
{



    function addTask($description): ArrayObject
    {
        $listTask = $this->getTaskList();

        $task = new Task();
        $task->id = $listTask->count();
        $task->taskDescription = $description;
        $task->isDone = false;
        $listTask[$listTask->count()] = $task;
        setcookie("listTask", json_encode($listTask), time() + (10 * 365 * 24 * 60 * 60), '/');
        return $listTask;
    }


    /**
     * @return ArrayObject
     */
    public function getTaskList(): ArrayObject
    {
        if ($_COOKIE["listTask"] != null) {
            $listTask = new ArrayObject(json_decode($_COOKIE["listTask"]));
            $listTaskToObject = new ArrayObject();
            foreach ($listTask as $value) {
                $task = new Task();
                $task->id = $value->id;
                $task->taskDescription = $value->taskDescription;
                $task->isDone = $value->isDone;
                $listTaskToObject->append($task);
            }
            return $listTaskToObject;
        } else {
            return new ArrayObject();
        }
    }

    public function setAllTasksCompleted(): ArrayObject
    {
        if ($_COOKIE["listTask"] != null) {
            $listTask = new ArrayObject(json_decode($_COOKIE["listTask"]));
            $listTaskToObject = new ArrayObject();
            foreach ($listTask as $value) {
                $task = new Task();
                $task->id = $value->id;
                $task->taskDescription = $value->taskDescription;
                $task->isDone = true;
                $listTaskToObject->append($task);
            }
            setcookie("listTask", json_encode($listTaskToObject), time() + (10 * 365 * 24 * 60 * 60), '/');
            return $listTaskToObject;
        } else {
            return new ArrayObject();
        }
    }

    public function deleteAllTasks(): ArrayObject
    {
        $newTaskList = new ArrayObject();
        setcookie("listTask", json_encode($newTaskList), time() + (10 * 365 * 24 * 60 * 60), '/');
        return $newTaskList;
    }

    public function setStatusTask($id, $status): ArrayObject
    {
        if ($_COOKIE["listTask"] != null) {
            $listTask = new ArrayObject(json_decode($_COOKIE["listTask"]));
            $listTaskToObject = new ArrayObject();
            foreach ($listTask as $value) {
                $task = new Task();
                $task->id = $value->id;
                $task->taskDescription = $value->taskDescription;
                if ($task->id == $id) {
                    $task->isDone = $status;
                } else {
                    $task->isDone = $value->isDone;
                }
                $listTaskToObject->append($task);
            }
            setcookie("listTask", json_encode($listTaskToObject), time() + (10 * 365 * 24 * 60 * 60), '/');
            return $listTaskToObject;
        } else {
            return new ArrayObject();
        }
    }

    public function deleteTask($id): ArrayObject
    {
        if ($_COOKIE["listTask"] != null) {
            $listTask = new ArrayObject(json_decode($_COOKIE["listTask"]));
            $listTaskToObject = new ArrayObject();
            foreach ($listTask as $value) {
                $task = new Task();
                $task->id = $value->id;
                $task->taskDescription = $value->taskDescription;
                if ($task->id == $id) {
                    continue;
                }
                $listTaskToObject->append($task);
            }
            setcookie("listTask", json_encode($listTaskToObject), time() + (10 * 365 * 24 * 60 * 60), '/');
            return $listTaskToObject;
        } else {
            return new ArrayObject();
        }
    }


}