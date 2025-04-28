<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Exception;
use Illuminate\Http\Request;
use League\CommonMark\Extension\DescriptionList\Node\Description;

class TaskController extends Controller
{
    public function index(){
        $allTasks = Task::all();
        return response()->json($allTasks, 200);
    }

    public function store(StoreTaskRequest $request){
        $createdTask = Task::create($request->validated());
        return response()->json($createdTask, 201);
    }

    public function getById(int $id){
        try {
            $task = Task::where("id","=", $id)->get();
            return response()->json($task, 200);
        }
        catch (Exception $e) {
            return response()->json("Error", 400);
        }
    }

    public function update(UpdateTaskRequest $request, int $id){
        try {
            $task = Task::findOrFail($id);
            if($task == null) {
                return response()->json("Not Found",404);
            }
            
            $task->update($request->validated());
            return response()->json($task, 200);
        }
        catch (Exception $e) {
            return response()->json("Error", 400);
        }
    }

    public function delete(int $id){
        try {
            $task = Task::findOrFail($id);
            if($task == null) {
                return response()->json("Not Found",404);
            }

            $task->delete();
            return response()->json("Deleted", 200);
        }
        catch (Exception $e) {
            return response()->json("Error", 400);
        }
    }
}
