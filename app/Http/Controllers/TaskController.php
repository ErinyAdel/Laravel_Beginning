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
        $validatedReq = $request->validate([
            "title" => "required|string|max:255",
            "description" => "nullable|string",
            "priority" => "required|integer|min:1"
        ]);

        $createdTask = Task::create($validatedReq);
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

    public function update(Request $request, int $id){
        try {
            $task = Task::findOrFail($id);
            if($task == null) {
                return response()->json("Not Found",404);
            }

            $validated = $request->validate([
                "title" => "sometimes|required|string|max:255",
                "description" => "sometimes|nullable|string",
                "priority" => "sometimes|required|integer|min:1"
            ]);
            $task->update($validated);
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
