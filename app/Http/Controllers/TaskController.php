<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    private $service;
    public function __construct(TaskService $taskService)
    {
        $this->service = $taskService;
    }
    public function getTask()
    {
        // chama funçao em service
        $this->service->getTask();
    }
    public function setTask(Request $request, $taskId)
    {
        // chama funçao em service
        $this->service->setTask($taskId, ['task_name' => $request->task_name]);
    }
}
