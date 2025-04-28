<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Exception;
use Illuminate\Http\Request;
use League\CommonMark\Extension\DescriptionList\Node\Description;

class TaskController extends Controller
{
    public function index(){
        $allTasks = Task::all();
        return response()->json($allTasks, 200);
    }

    public function store(Request $request){
        try {
            $createdTask = Task::create([
                "title" => $request->title,
                "description" => $request->description,
                "priority" => $request->priority,
            ]);
    
            return response()->json($createdTask, 200);
        }
        catch (Exception $e) {
            return response()->json("Error", 400);
        }
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

    public function update(Request $request, int $id){
        try {
            $task = Task::findOrFail($id);
            if($task == null) {
                return response()->json("Not Found",404);
            }

            $task->update($request->all());
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
