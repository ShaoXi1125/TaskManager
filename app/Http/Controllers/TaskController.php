<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;

class TaskController extends Controller
{
    //显示所有数据
    public function fetchAllTasks(){
        //all() = "SELECT * FROM `tasks`;
        $tasks = Tasks::all();
        //$row['column name']
        //return view('index', ['tasks' => $tasks]);
        return view('index',compact('tasks'));
    }

    public function createTask(){
        return view('create');
    }

    //添加数据
    public function addTask(Request $request){
        $request->validate([
            'title' =>'required|max:255',
            'description' =>'required',
            'due_date' =>'required|date'
        ]);

        Tasks::create($request->all());

        return redirect()->route('index')->with('success', 'Task added successfully');
    }

    public function doneTask(Request $request, $id){
        $tasks = Tasks::findOrFail($id);

        // $request->validate([
        //     'isCompleted' =>'required'
        // ]);

        $tasks->isCompleted = true;
        $tasks->save();

        return redirect()->route('index')->with('success', 'Task marked as done successfully');
    }

    public function editTask($id){

        $tasks = Tasks::findOrFail($id);

        return view ('edit',compact('tasks'));
    }

    public function updateTask(Request $request, $id){

        $tasks = Tasks::findOrFail($id);

        $request->validate([
            'title' =>'required|max:255',
            'description' =>'required',
            'due_date' =>'required|date'
        ]);

        //$sql = "UPDATE tasks SET title = '$request->title', description = '$request->description', due_date = '$request->due_date' WHERE id = $id"
        $tasks->update($request->all());

        return redirect()->route('index')->with('success', 'Task updated successfully');
    }

    public function deleteTask($id){
        $tasks = Tasks::findOrFail($id);

        //$sql = "DELECT FORM tasks WHERE id = $id";
        $tasks->delete();
        return redirect()->route('index')->with('success', 'Task deleted successfully');

    }
}
