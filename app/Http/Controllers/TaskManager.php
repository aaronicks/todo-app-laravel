<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tasks;
use Illuminate\Http\Request;

class TaskManager extends Controller
{

    function listTask()
    {
        $tasks = Tasks::where("user_id", auth()->user()->id)
            ->where("status", NULL)->paginate(perPage: 3);
        return view("welcome", compact("tasks"));

    }

    function addTask()
    {
        return view('tasks.add');
    }


    function addTaskPost(Request $request)
    {
        $request->validate([
            "title"=> "required",
            "deadline"=>"required", 
            "description"=>"required",
        ]);
        $tasks = new Tasks;
        $tasks->title = $request->title;
        $tasks->deadline = $request->deadline;
        $tasks->description = $request->description;
        $tasks->user_id = auth()->user()->id;   
        if($tasks->save())
        {
            return redirect(route("home"))
                ->with("success", "Task Added Successfully! ");
        }
        return redirect(route("add.task"))
            ->withErrors("error","Task Failed to Add! ");
    }


    function updateTaskStatus($id)
    {
        if(Tasks::where("user_id", auth()->user()->id)
            ->where("id", $id)->update(["status" => "completed"]))
        {
            return redirect(route("home"))->with("success","Task Completed");
        }
        return redirect(route("home"))->withErrors("error","Task Failed to Complete, Pls try Again");
    }


    function deleteTask($id)
    {
        if(Tasks::where("user_id", auth()->user()->id)
            ->where("id", $id)->delete())
        {
            return redirect(route("home"))->with("success","Task Deleted");
        }
        return redirect(route("home"))->withErrors("error","Task Failed to Delete, Pls try Again");
    }
}
