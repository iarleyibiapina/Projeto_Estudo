<?php


namespace App\Repositories\Interfaces;

use App\Models\TaskModel;

interface TaskRepositoryInterface
{
    public function __construct(TaskModel $taskModel);
    // acessa repository
    public function getTask();
    // acessa repository

    public function setTask($taskId, array $data);
}
