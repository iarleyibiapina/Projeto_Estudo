<?php

namespace App\Services;

use App\Repositories\Interfaces\TaskRepositoryInterface;

class TaskService
{

    private $repo;
    public function __construct(TaskRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
    public function getTask()
    {
        // chama funcao em interface
        $this->repo->getTask();
    }
    public function setTask($taskId, array $data)
    {
        // chama funcao em interface
        $this->repo->setTask($taskId, $data);
    }
}
