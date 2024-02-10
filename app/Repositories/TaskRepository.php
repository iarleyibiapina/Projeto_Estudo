<?php

use App\Models\TaskModel;
use App\Repositories\Interfaces\TaskRepositoryInterface;

class TaskRepository implements TaskRepositoryInterface
{
    protected $model;
    public function __construct(TaskModel $taskModel)
    {
        $this->model = $taskModel;
    }

    // acessado via interface, persite no banco
    public function getTask()
    {
        $this->model->all();
    }
    // acessado via interface, persite no banco

    public function setTask($taskId, array $data)
    {
        $this->model->where('task_id', $taskId)->update($data);
    }
}
