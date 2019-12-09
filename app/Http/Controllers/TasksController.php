<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TasksController extends Controller
{
    
    public function index()
    {
        $tasks = Task::all();
        
        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }

   
    public function create()
    {
        $task = new Task;
        
        return view('tasks.create', [
            'task' => $task,
        ]);
    }

    
    public function store(Request $request)
    {
        $task = new Task;
        
        $task->validate($request, [
            'content' => 'requires | max:191',
        ]);
        
        $task->content = $request->content;
        $task->save();
        
        return redirect('/');
    }

   
    public function show($id)
    {
        $task = Task::find($id);
        
        return view('tasks.show', [
                'task' => $task,
            ]);
        
        
    }

    
    public function edit($id)
    {
        $task = Task::find($id);
        
        return view('tasks.edit', [
                'task' => $task,
            ]);
    }

    
    public function update(Request $request, $id)
    {
        $task->validate($request, [
            'content' => 'requires | max:191',
        ]);
        
        $task = Task::find($id);
        $task->content = $request->content;
        $task->save();
        
        return redirect('/');
    }

    
    public function destroy($id)
    {
        $task = Task::find($id);
        
        $task->delete();
        
        return redirect('/');
    }
}
